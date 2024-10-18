<?php

// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        
        $request->validate([
            'txtName' => 'required|string',
            'txtEmail' => 'required|email',
            'txtPhone' => 'required|string',
            'txtMsg' => 'nullable|string',
        ]);

        
        Mail::to('')->send(new ContactFormMail($data));

        return response()->json(['success' => 'Thank you! Your message has been sent.']);
    }
}
