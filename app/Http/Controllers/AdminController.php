<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Application;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::where('is_admin', '!=', 1)->get();
        return view('admin.users', compact('users'));
    }

    public function vendors()
    {
        $vendors = Vendor::with('owner')->get();
        return view('admin.vendors', compact('vendors'));
    }

    public function applications()
    {
        $applications = Application::all();
        return view('admin.applications', compact('applications'));
    }

    public function VendorVisible(Request $request, Vendor $vendor)
    {
        $vendor->visible = $request->has('visible') ? 1 : 0;
        $vendor->save();
        
        return redirect()->route('admin.vendors');
    }
}