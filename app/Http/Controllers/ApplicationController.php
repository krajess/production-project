<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $application = Application::where('user_id', $user->id)->first();
        $vendor = Vendor::where('owner_id', Auth::id())->first();
        $appSent = Application::where('user_id', $user->id)->exists();
        return view('applications.index', compact('application', 'appSent', 'vendor'));
    }

    public function create()
    {
        $user = Auth::user();
        $application = Application::where('user_id', $user->id)->first();
    
        if ($application && $application->status !== 'rejected') {
            return redirect()->route('applications.index');
        }
    
        return view('applications.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'dob' => 'required|date_format:Y-m-d',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|digits_between:5,15',
            'address' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'postcode' => 'required|string|max:10',
            'country' => 'required|string|max:50',
            'vendor_name' => 'required|string|max:30',
            'vendor_type' => 'required|string|max:250',
            'vendor_description' => 'required|string|max:1000',
            'vendor_experience' => 'required|string|max:1000',
            'terms_conditions' => 'required|accepted',
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
            $user->is_vendor_owner = 1;
            $user->save();
    
            Vendor::create([
                'name' => $application->vendor_name,
                'description' => $application->vendor_description,
                'owner_id' => $user->id,
                'email' => $application->email,
            ]);
        }
    
        return redirect()->route('admin.applications');
    }
}