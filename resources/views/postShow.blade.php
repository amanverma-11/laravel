<!-- resources/views/posts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/postsStyle.css')}}">
    <title>Post</title>
</head>
<body>
    <ul>
            <li>
                <strong>{{ $post->title }}</strong>
                <p>{{ $post->content }}</p>
                <form action="{{route('edit', ['post' => $post])}}">
                    <button>Edit</button>
                </form>
                <form method="POST" action="{{route('delete', ['post' => $post])}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" /> 
                    <button type="submit">Delete</button>
                </form>
            </li>
    </ul>
</body>
</html>
