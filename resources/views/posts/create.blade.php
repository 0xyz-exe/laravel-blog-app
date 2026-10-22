<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Create Post</h2></x-slot>
<div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 rounded-lg shadow">
<form method="POST" action="{{ route('posts.store') }}">@csrf
<div class="mb-4"><label class="block text-sm font-medium mb-2">Title *</label>
<input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-md border-gray-300">
@error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Category</label>
<select name="category_id" class="w-full rounded-md border-gray-300"><option value="">None</option>
@foreach($categories as $cat)<option value="{{ $cat->id }}">{{ $cat->name }}</option>@endforeach</select></div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Excerpt</label>
<textarea name="excerpt" rows="2" class="w-full rounded-md border-gray-300">{{ old('excerpt') }}</textarea></div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Content *</label>
<textarea name="content" rows="10" required class="w-full rounded-md border-gray-300">{{ old('content') }}</textarea>
@error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror</div>
<div class="mb-4"><label class="block text-sm font-medium mb-2">Status *</label>
<select name="status" required class="w-full rounded-md border-gray-300">
<option value="draft">Draft</option><option value="published">Published</option></select></div>
<div class="flex gap-3"><button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Create Post</button>
<a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</a></div>
</form></div></div></div>
</x-app-layout>
