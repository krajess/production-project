<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        ContactMessage::create([
            'user_id' => Auth::id(),
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.create')->with('success', 'Your message has been sent.');
    }

    public function index()
    {
        $messages = ContactMessage::with('user')->latest()->get();
        return view('admin.show_contact', compact('messages'));
    }
}