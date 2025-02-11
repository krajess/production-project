<?php
namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|max:15',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'business_name' => 'required|string|max:50',
            'business_type' => 'required|string|max:50',
            'business_description' => 'required|string|max:500',
            'business_experience' => 'required|string|max:255',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('applications.index');
    }

    public function index()
    {
        return view('applications.index');
    }
}