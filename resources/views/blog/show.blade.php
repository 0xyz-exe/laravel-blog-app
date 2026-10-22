<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>{{ $post->title }}</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-50"><div class="max-w-3xl mx-auto py-12 px-4">
<nav class="mb-6"><a href="{{ route('blog.index') }}" class="text-indigo-600 hover:text-indigo-800">← Back to blog</a></nav>
<article class="bg-white rounded-lg shadow p-8"><header class="mb-6">
<h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
<div class="text-gray-600 mb-4">By {{ $post->user->name }} • {{ $post->published_at->format('F d, Y') }}
@if($post->category)<span> • <a href="{{ route('blog.category', $post->category->slug) }}" class="text-indigo-600">{{ $post->category->name }}</a></span>@endif</div>
@if($post->excerpt)<p class="text-xl text-gray-700 italic border-l-4 border-indigo-600 pl-4">{{ $post->excerpt }}</p>@endif
</header>
<div class="prose max-w-none text-gray-800 leading-relaxed">{!! nl2br(e($post->content)) !!}</div>
@auth @if(auth()->id() === $post->user_id)
<div class="mt-8 pt-6 border-t"><a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit Post</a></div>
@endif @endauth
</article></div></body></html>
