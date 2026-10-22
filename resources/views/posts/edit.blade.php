<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Edit Post</h2></x-slot>
<div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 rounded-lg shadow">
<form method="POST" action="{{ route('posts.update', $post) }}">@csrf @method('PATCH')
<div class="mb-4"><label class="block text-sm font-medium mb-2">Title *</label>
<input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full rounded-md border-gray-300"></div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Excerpt</label>
<textarea name="excerpt" rows="2" class="w-full rounded-md border-gray-300">{{ old('excerpt', $post->excerpt) }}</textarea></div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Content *</label>
<textarea name="content" rows="10" required class="w-full rounded-md border-gray-300">{{ old('content', $post->content) }}</textarea></div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Status *</label>
<select name="status" required class="w-full rounded-md border-gray-300">
<option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
<option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Published</option>
<option value="archived" {{ $post->status === 'archived' ? 'selected' : '' }}>Archived</option></select></div>
<div class="flex justify-between"><div class="flex gap-3">
<button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
<a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</a></div>
<form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
<button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button></form></div>
</form></div></div></div>
</x-app-layout>
