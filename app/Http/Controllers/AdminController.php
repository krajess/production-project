<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

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

    public function shops()
    {
        $shops = Shop::with('owner')->get();
        return view('admin.shops', compact('shops'));
    }
}