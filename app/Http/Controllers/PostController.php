<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['publicIndex', 'publicShow']);
    }

    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('posts.index', compact('posts'));
    }

    /*Show the form for creating a new post*/
    
    public function create()
    {
        return view('posts.create');
    }

    /* Store a newly created post in storage*/

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'head_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Keep backward compatibility for old 'image' field
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 10 characters.',
            'head_image.image' => 'The head image must be an image.',
            'head_image.mimes' => 'The head image must be a file of type: jpeg, png, jpg, gif.',
            'head_image.max' => 'The head image may not be greater than 2MB.',
            'article_images.*.image' => 'Each article image must be an image.',
            'article_images.*.mimes' => 'Each article image must be a file of type: jpeg, png, jpg, gif.',
            'article_images.*.max' => 'Each article image may not be greater than 2MB.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors below.');
        }

        try {
            $postData = [
                'title' => trim($request->title),
                'content' => $request->content,
                'user_id' => Auth::id(),
            ];

            // Handle images - check for new format first, then fallback to old format
            $imagePath = null;
            $articleImages = [];

            // Handle head image (new format)
            if ($request->hasFile('head_image')) {
                $image = $request->file('head_image');
                $imageName = time() . '_head_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('news', $imageName, 'public');
            }
            // Handle old single image format for backward compatibility
            elseif ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('news', $imageName, 'public');
            }

            // Handle article images
            if ($request->hasFile('article_images')) {
                foreach ($request->file('article_images') as $index => $articleImage) {
                    if ($articleImage && $articleImage->isValid()) {
                        $articleImageName = time() . '_article_' . ($index + 1) . '_' . Str::random(10) . '.' . $articleImage->getClientOriginalExtension();
                        $articleImagePath = $articleImage->storeAs('news/articles', $articleImageName, 'public');
                        $articleImages[] = $articleImagePath;
                    }
                }
            }

            // Store the main image
            if ($imagePath) {
                $postData['image'] = $imagePath;
            }

            // Store article images as JSON if any exist
            if (!empty($articleImages)) {
                $postData['article_images'] = json_encode($articleImages);
            }

            $post = Post::create($postData);

            return redirect()->route('dashboard')
                ->with('success', 'Post "' . $post->title . '" created successfully!' . 
                       ($imagePath ? ' Head image uploaded.' : '') . 
                       (!empty($articleImages) ? ' ' . count($articleImages) . ' article image(s) uploaded.' : ''));
        } catch (\Exception $e) {
            Log::error('Error creating post: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred while creating the post. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'head_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Keep backward compatibility for old 'image' field
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 10 characters.',
            'head_image.image' => 'The head image must be an image.',
            'head_image.mimes' => 'The head image must be a file of type: jpeg, png, jpg, gif.',
            'head_image.max' => 'The head image may not be greater than 2MB.',
            'article_images.*.image' => 'Each article image must be an image.',
            'article_images.*.mimes' => 'Each article image must be a file of type: jpeg, png, jpg, gif.',
            'article_images.*.max' => 'Each article image may not be greater than 2MB.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors below.');
        }

        try {
            $updateData = [
                'title' => trim($request->title),
                'content' => $request->content,
            ];

            $newImagesUploaded = [];

            // Handle head image update (new format)
            if ($request->hasFile('head_image')) {
                // Delete old main image if exists
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }

                $image = $request->file('head_image');
                $imageName = time() . '_head_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('news', $imageName, 'public');
                $updateData['image'] = $imagePath;
                $newImagesUploaded[] = 'head image';
            }
            // Handle old single image format for backward compatibility
            elseif ($request->hasFile('image')) {
                // Delete old image if exists
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }

                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('news', $imageName, 'public');
                $updateData['image'] = $imagePath;
                $newImagesUploaded[] = 'image';
            }

            // Handle article images update
            if ($request->hasFile('article_images')) {
                // Delete old article images if they exist
                if ($post->article_images) {
                    $oldArticleImages = json_decode($post->article_images, true);
                    if (is_array($oldArticleImages)) {
                        foreach ($oldArticleImages as $oldImage) {
                            if (Storage::disk('public')->exists($oldImage)) {
                                Storage::disk('public')->delete($oldImage);
                            }
                        }
                    }
                }

                $articleImages = [];
                foreach ($request->file('article_images') as $index => $articleImage) {
                    if ($articleImage && $articleImage->isValid()) {
                        $articleImageName = time() . '_article_' . ($index + 1) . '_' . Str::random(10) . '.' . $articleImage->getClientOriginalExtension();
                        $articleImagePath = $articleImage->storeAs('news/articles', $articleImageName, 'public');
                        $articleImages[] = $articleImagePath;
                    }
                }

                if (!empty($articleImages)) {
                    $updateData['article_images'] = json_encode($articleImages);
                    $newImagesUploaded[] = count($articleImages) . ' article image(s)';
                } else {
                    $updateData['article_images'] = null;
                }
            }

            $post->update($updateData);

            $successMessage = 'Post "' . $post->title . '" updated successfully!';
            if (!empty($newImagesUploaded)) {
                $successMessage .= ' Updated: ' . implode(', ', $newImagesUploaded) . '.';
            }

            return redirect()->route('dashboard')
                ->with('success', $successMessage);
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred while updating the post. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $postTitle = $post->title;

            // Delete associated main image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Delete associated article images if they exist
            if ($post->article_images) {
                $articleImages = json_decode($post->article_images, true);
                if (is_array($articleImages)) {
                    foreach ($articleImages as $articleImage) {
                        if (Storage::disk('public')->exists($articleImage)) {
                            Storage::disk('public')->delete($articleImage);
                        }
                    }
                }
            }

            $post->delete();

            return redirect()->route('dashboard')
                ->with('success', 'Post "' . $postTitle . '" deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred while deleting the post. Please try again.');
        }
    }

    /**
     * Display posts for public viewing.
     */
    public function publicIndex(Request $request)
    {
         $sortBy = $request->get('sort', 'latest');
    
    $query = Post::with('user');
    
    // Apply sorting based on user selection
    switch ($sortBy) {
        case 'oldest':
            $query->orderBy('created_at', 'asc');
            break;
        case 'most_viewed':
            $query->orderBy('views', 'desc')->orderBy('created_at', 'desc');
            break;
        case 'least_viewed':
            $query->orderBy('views', 'asc')->orderBy('created_at', 'desc');
            break;
        case 'latest':
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }
    
    $news = $query->paginate(9)->appends(request()->query());
    
    // Get popular news for sidebar (separate query to avoid conflicts)
    $popularNews = Post::where('views', '>', 0)
        ->orderBy('views', 'desc')
        ->limit(5)
        ->get();
    
    return view('news', compact('news', 'popularNews'));
    }

    /**
     * Display a specific post for public viewing.
     */
    public function publicShow(Post $post)
    {
        // Increment view count
        $post->increment('views');
        
        $post->load('user');
        return view('news-detail', compact('post'));
    }

    /**
     * Get posts statistics for dashboard.
     */
    public function getStats()
    {
        try {
            $stats = [
                'total' => Post::count(),
                'recent' => Post::where('created_at', '>=', now()->subDays(7))->count(),
                'this_month' => Post::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count(),
                'with_images' => Post::whereNotNull('image')->count(),
                'with_article_images' => Post::whereNotNull('article_images')->count(),
                'by_current_user' => Post::where('user_id', Auth::id())->count(),
            ];

            return response()->json([
                'status' => 'success',
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting post stats: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to load statistics'
            ], 500);
        }
    }
}