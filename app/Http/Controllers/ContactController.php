<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        // Save to database
        Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message
        ]);

        // Redirect back with a success flash message
        return redirect()->back();
    }
}
