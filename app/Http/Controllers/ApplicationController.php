<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $appSent = Application::where('user_id', $user->id)->exists();
        $applications = Application::all();
        return view('applications.index', compact('applications', 'appSent'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|digits_between:10,15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'business_description' => 'required|string|max:1000',
            'business_experience' => 'required|string|max:1000',
        ]);
        
        $application = new Application($request->all());
        $application->user_id = $request->user()->id;
        $application->status = 'new';
        $application->save();
        
        return redirect()->route('applications.index');
    }

    public function show(Application $application)
    {
        return view('admin.show-application', compact('application'));
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        $application->update($request->all());
        return redirect()->route('applications.index');
    }

    public function destroy(Application $application)
    {
        //
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|string|in:new,pending,accepted,rejected',
        ]);
    
        $application->status = $request->input('status');
        $application->save();
    
        if ($application->status === 'accepted') {
            $user = $application->user;
            $user->is_business_owner = 1;
            $user->save();
    
            Shop::create([
                'name' => $application->business_name,
                'description' => $application->business_description,
                'owner_id' => $user->id,
            ]);
        }
    
        return redirect()->route('admin.applications');
    }
}