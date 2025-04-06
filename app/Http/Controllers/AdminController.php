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
        $total_users = \App\Models\User::count();
        $last_user = \App\Models\User::latest()->first();
        $total_vendor_owners = \Illuminate\Support\Facades\DB::table('users')->where('is_vendor_owner', 1)->count();

        $total_products = \App\Models\Product::count();
        $last_product = \App\Models\Product::latest()->first();

        $total_vendors = \App\Models\Vendor::count();
        $last_vendor = \App\Models\Vendor::latest()->first();
        
        $total_applications = \App\Models\Application::count();
        $last_application = \App\Models\Application::latest()->first();
        $accepted_applications = \App\Models\Application::where('status', 'accepted')->count();
        $rejected_applications = \App\Models\Application::where('status', 'rejected')->count();
        $pending_applications = \App\Models\Application::where('status', 'pending')->count();
        $new_applications = \App\Models\Application::where('status', 'new')->count();
    
        return view('admin.index', compact(
            'total_users',
            'last_user',
            'total_vendor_owners',
            'total_products',
            'last_product',
            'total_vendors',
            'last_vendor',
            'total_applications',
            'last_application',
            'accepted_applications',
            'rejected_applications',
            'pending_applications',
            'new_applications'
        ));
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