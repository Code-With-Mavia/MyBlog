<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="navbar">
        <a href="/posts">All Posts</a>
        <a href="/posts/create">Create Post</a>
    </div>
    <div class="container">
        <a href="/posts" class="back-link">Back to Posts</a>
        <h1>Edit Post</h1>
        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('PUT')
            <label>Title:</label>
            <input type="text" name="title" value="{{ $post->title }}" required>
            <label>Body:</label>
            <textarea name="body" required>{{ $post->body }}</textarea>
            <div class="form-actions">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
