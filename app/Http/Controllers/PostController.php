<?php
namespace App\Http\Controllers;
use App\Models\{Post, Category};
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->where('user_id', auth()->id())->latest()->paginate(15);
        return view('posts.index', compact('posts'));
    }
    
    public function create() { return view('posts.create', ['categories' => Category::all()]); }
    
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($data['status'] === 'published' && !$data['published_at']) $data['published_at'] = now();
        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post created.');
    }
    
    public function show(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.show', compact('post'));
    }
    
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.edit', compact('post'));
    }
    
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);
        $data = $request->validated();
        if ($data['status'] === 'published' && !$post->published_at) $data['published_at'] = now();
        $post->update($data);
        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }
    
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
