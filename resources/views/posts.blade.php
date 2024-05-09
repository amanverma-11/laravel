<!-- resources/views/posts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/postsStyle.css')}}">
    <title>All Posts</title>
</head>
<body>
    <div>
        <a href="{{route('post.create')}}">Create a New Post</a>
        <x-logout/>
    </div>
    <h1>All Posts</h1>

    <ul>
        @foreach($allPosts as $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <p>{{ $post->content }}</p>
                <a href="{{route('post.show', ['id' => $post->id])}}"><button>Show Full Post</button></a>
            </li>
        @endforeach
    </ul>
</body>
</html>
