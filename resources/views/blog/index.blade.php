<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Blog</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50"><div class="max-w-5xl mx-auto py-12 px-4">
<header class="mb-12"><h1 class="text-4xl font-bold text-gray-900 mb-4">Blog</h1>
<nav class="flex gap-4"><a href="{{ route('blog.index') }}" class="text-indigo-600 hover:text-indigo-800">Home</a>
@auth<a href="{{ route('posts.index') }}" class="text-indigo-600 hover:text-indigo-800">My Posts</a>@else
<a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">Login</a>@endauth</nav></header>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6"><div class="md:col-span-3">
@forelse($posts as $post)
<article class="bg-white rounded-lg shadow p-6 mb-6"><h2 class="text-2xl font-bold mb-2">
<a href="{{ route('blog.show', $post->slug) }}" class="text-gray-900 hover:text-indigo-600">{{ $post->title }}</a></h2>
<div class="text-sm text-gray-600 mb-3">By {{ $post->user->name }} • {{ $post->published_at->format('M d, Y') }}
@if($post->category)<span> • <a href="{{ route('blog.category', $post->category->slug) }}" class="text-indigo-600 hover:text-indigo-800">{{ $post->category->name }}</a></span>@endif</div>
@if($post->excerpt)<p class="text-gray-700 mb-3">{{ $post->excerpt }}</p>@endif
<a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">Read more →</a>
</article>
@empty<p class="text-gray-500">No posts yet.</p>@endforelse
<div class="mt-6">{{ $posts->links() }}</div></div>

<aside class="md:col-span-1"><div class="bg-white rounded-lg shadow p-6"><h3 class="font-bold mb-4">Categories</h3>
<ul class="space-y-2">@foreach($categories as $cat)
<li><a href="{{ route('blog.category', $cat->slug) }}" class="text-indigo-600 hover:text-indigo-800">{{ $cat->name }} ({{ $cat->posts_count }})</a></li>
@endforeach</ul></div></aside>
</div></div></body></html>
