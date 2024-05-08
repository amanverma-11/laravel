<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/postStyle.css')}}">
    <title>Create Post</title>
</head>
<body>
    <div class="form">
        <h1>Create a New Post</h1>
        <form method="POST" action="{{route('post')}}">
            @csrf
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br><br>
            
            <label for="content">Content:</label><br>
            <textarea id="content" name="content"></textarea><br><br>
            
            <button type="submit">Create Post</button>
        </form>
    </div>
</body>
</html>
