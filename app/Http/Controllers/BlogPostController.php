<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show a single blog post by ID
     */
    public function show($id)
    {
        $post = BlogPost::with('author')->find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    /**
     * Update a blog post (Only admin or author can update their post)
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->author_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'category' => ['sometimes', Rule::in(['Technology', 'Lifestyle', 'Education'])] // Restrict categories
        ]);

        $post->update($request->only(['title', 'content', 'category']));

        return response()->json($post, 200);
    }

    /**
     * Get all blog posts with filtering, search, and pagination
     */
    public function index(Request $request) 
    {
        $query = BlogPost::with('author');

        // 🔍 Search by title, author name, or category
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('author', function ($q) use ($searchTerm) {
                      $q->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%");
        }

        // 🔹 Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // 🔹 Filter by author
        if ($request->has('author_id')) {
            $query->where('author_id', $request->author_id);
        }

        // 🔹 Filter by date range
        if ($request->has(['start_date', 'end_date'])) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // 🔹 Paginate results (default: 10 posts per page)
        $posts = $query->paginate(10);

        return response()->json($posts);
    }

    /**
     * Create a new blog post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => ['required', Rule::in(['Technology', 'Lifestyle', 'Education'])] // Restrict categories
        ]);

        $post = BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'author_id' => auth()->id() // Assign logged-in user
        ]);

        return response()->json($post, 201);
    }

    /**
     * Delete a blog post (Only admin or author can delete their post)
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->author_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
