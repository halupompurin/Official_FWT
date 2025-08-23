<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
     /**
     * Display all messages in admin dashboard
     */
    public function index(Request $request)
    {
        $query = Message::query()->latest();
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }
        
        $messages = $query->paginate(10);
        
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show a specific message
     */
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Delete a message
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Mesej telah dipadam.');
    }

    /**
     * Delete multiple messages
     */
    public function bulkDelete(Request $request)
    {
        $messageIds = $request->input('message_ids', []);
        Message::whereIn('id', $messageIds)->delete();
        
        return redirect()->back()->with('success', 'Mesej yang dipilih telah dipadam.');
    }
}
