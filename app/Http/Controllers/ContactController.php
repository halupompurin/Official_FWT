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
        try {
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

            // Check if this is an AJAX request
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pesanan anda telah berjaya dihantar. Kami akan membalas secepat mungkin.'
                ]);
            }

            // For regular form submission, redirect with success session
            return redirect()->back()->with('success', 'Pesanan anda telah berjaya dihantar. Kami akan membalas secepat mungkin.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sila pastikan semua maklumat diisi dengan betul.',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Handle other errors
            Log::error('Contact form error: ' . $e->getMessage());

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maaf, terdapat masalah. Sila cuba lagi.'
                ], 500);
            }

            return redirect()->back()->with('error', 'Maaf, terdapat masalah. Sila cuba lagi.')->withInput();
        }
    }
}