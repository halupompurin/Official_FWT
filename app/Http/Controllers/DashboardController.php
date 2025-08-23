<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Post;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the dashboard
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Add this line to fetch posts:
        $posts = \App\Models\Post::with('user')->orderBy('created_at', 'desc')->paginate(12);

        $response = response()->view('admin.dashboard', compact('user', 'posts')); // Add 'posts'
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');

        return $response;
    }
    public function viewMessages(Request $request)
    {
        $query = Message::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('message', 'LIKE', "%{$search}%");
            });
        }

        $messages = $query->latest()->paginate(15);

        // Calculate statistics
        $totalMessages = Message::count();
        $todayMessages = Message::whereDate('created_at', Carbon::today())->count();

        return view('admin.messages', compact(
            'messages',
            'totalMessages',
            'todayMessages'
        ));

        return $response
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }



    public function destroyMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
