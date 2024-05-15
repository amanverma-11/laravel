<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
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
            {{-- Like Button with Font Awesome --}}
            <form action="{{route('post.like', ['id' => $post->id])}}" method="post">
                <div class="flex justify-start mt-4 ml-4">
                    @csrf
                    <button onclick="toggleLike()" class="like-button focus:outline-none" data-post-id="{{ $post->id }}">
                        <i class="far fa-heart mr-2 text-xl"></i> <!-- Regular heart icon -->
                    </button>
                </div>
            </form>
            <div class="bg-gray-100 px-4 py-2">
                <h3 class="text-lg font-semibold mb-4">Comments</h3>
                @foreach($post->comments as $comment)
                    <div class="mb-2">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <p class="text-gray-500 text-sm">- {{ $comment->user->username }}</p>
                    </div>
                @endforeach
                <form action="{{ route('post.addComment', ['id' => $post->id]) }}"method="POST" class="mt-4">
                    @csrf
                    <textarea name="content" rows="3" class="w-full p-2 border border-gray-300 rounded" placeholder="Add a comment"></textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/all.min.js') }}"></script>
    {{-- JavaScript for like button toggle --}}
    <script src="">
        document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelector(".like-button")
        .addEventListener("click", function (event) {
            event.preventDefault();
            const postId = this.getAttribute("data-post-id");
            const icon = this.querySelector("i");

            if(icon.classList.contains("far")){
                icon.classList.remove("far");
                icon.classList.add("fas");
            } else{
                icon.classList.remove("fas");
                icon.classList.add("far");
            }
        });
});

    </script>
</body>
</html>
