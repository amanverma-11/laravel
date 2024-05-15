<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    
    <x-navbar/>
    <div class="container mx-auto py-8 px-3">
    <div class="mb-4">
        <a href="{{ route('post.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block">Create a New Post</a>
    </div>
    <h1 class="text-3xl font-bold mb-4">All Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($allPosts as $post)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 truncate">{{ $post->title }}</h2>
                    <p class="text-gray-700">{{ substr($post->content, 0, 100) . (strlen($post->content) > 50 ? '...' : '') }}</p>
                </div>
                <p class="text-gray-500 font-semibold text-right mr-2">Created by: {{ $post->user->username }}</p>
                <div class="bg-gray-100 px-4 py-2">
                    <a href="{{ route('post.show', ['id' => $post->id]) }}" class="text-blue-500 hover:underline">Show Full Post</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
