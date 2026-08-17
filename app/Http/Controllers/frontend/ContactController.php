<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        Contact::create($validated);
        return redirect()->route('frontend.contact')->with('success','Thank you for contacting us. We will get back to you soon.');
    }
}