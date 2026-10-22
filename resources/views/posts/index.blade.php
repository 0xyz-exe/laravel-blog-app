<x-app-layout>
<x-slot name="header"><div class="flex justify-between items-center"><h2 class="font-semibold text-xl text-gray-800">My Posts</h2>
<a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">+ New Post</a></div></x-slot>
<div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
@if(session('success'))<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>@endif
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
<table class="w-full"><thead><tr class="border-b"><th class="text-left py-2">Title</th><th class="text-left">Category</th><th class="text-left">Status</th><th class="text-left">Date</th><th class="text-right">Actions</th></tr></thead>
<tbody>@foreach($posts as $post)
<tr class="border-b"><td class="py-2"><a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-800">{{ $post->title }}</a></td>
<td>{{ $post->category->name ?? '-' }}</td><td><span class="px-2 py-1 text-xs rounded {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">{{ $post->status }}</span></td>
<td class="text-sm">{{ $post->created_at->format('M d, Y') }}</td>
<td class="text-right"><a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800 mr-2">Edit</a>
<form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
<button type="submit" class="text-red-600 hover:text-red-800">Delete</button></form></td>
</tr>@endforeach</tbody></table>
<div class="mt-4">{{ $posts->links() }}</div>
</div></div></div>
</x-app-layout>
