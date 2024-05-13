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
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p class="text-gray-600">{{ $post->content }}</p>
            </div>
            <div class="px-4 py-2 bg-gray-100 flex justify-between items-center">
                <form action="{{ route('post.edit', ['post' => $post]) }}" method="GET">
                    <button type="submit" class="text-blue-500 hover:underline">Edit</button>
                </form>
                <form action="{{ route('post.delete', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
