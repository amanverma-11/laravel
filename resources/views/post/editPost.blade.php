<!-- resources/views/posts/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/postEditStyle.css')}}">
    <title>Edit Post</title>
</head>
<body>
    <x-logout/>
    <h1>Edit Post</h1>
    <form method="POST" action="{{route('post.update', ['post' => $post])}}">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content">{{ $post->content }}</textarea><br><br>
        
        <button type="submit">Update Post</button>
    </form>
</body>
</html>
