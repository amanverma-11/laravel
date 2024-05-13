<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    {{-- Navbar Component --}}
    <x-navbar/>
    
    {{-- Main Content --}}
    <div class="flex flex-1 justify-center items-center">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-4">Welcome to the Home Page</h1>
            
            @auth
                <div class="flex justify-center mb-4">
                    <a href="{{ route('post.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block">Create a Post</a>
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('posts.show') }}" class="text-blue-500 hover:underline">View All Posts</a>
                </div>
            @else
                <p class="text-center text-gray-600 mt-4">Login to create and see posts.</p>
            @endauth
        </div>
    </div>
</body>
</html>
