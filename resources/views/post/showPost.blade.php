<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    {{-- Navbar Component --}}
    <x-navbar/>

    <div class="max-w-lg mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2 truncate">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->content }}</p>
                <p class="text-gray-500 text-right">Created by: {{ $post->user->username }}</p>
            </div>
            <div class="bg-gray-100 px-4 py-2">
                <h3 class="text-lg font-semibold mb-4">Comments</h3>
                @foreach($post->comments as $comment)
                    <div class="mb-2">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <p class="text-gray-500 text-sm">- {{ $comment->user->username }}</p>
                    </div>
                @endforeach
                @if(auth()->check())
                    <form action="{{ route('post.addComment', ['id' => $post->id]) }}" method="POST" class="mt-4">
                        @csrf
                        <textarea name="content" rows="3" class="w-full p-2 border border-gray-300 rounded" placeholder="Add a comment"></textarea>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-2">Submit</button>
                    </form>
                @else
                    <p class="text-gray-500 mt-4">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to add a comment.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
