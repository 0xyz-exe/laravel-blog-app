<?php
namespace App\Http\Controllers;
use App\Models\{Post, Category};

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with('user', 'category')->latest('published_at')->paginate(10);
        $categories = Category::withCount('posts')->get();
        return view('blog.index', compact('posts', 'categories'));
    }
    
    public function show(Post $post)
    {
        if ($post->status !== 'published' && (!auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }
        return view('blog.show', compact('post'));
    }
    
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::published()->where('category_id', $category->id)->with('user')->latest('published_at')->paginate(10);
        return view('blog.category', compact('category', 'posts'));
    }
}
