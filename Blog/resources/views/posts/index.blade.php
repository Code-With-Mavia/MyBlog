<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="navbar">
        <a href="/posts">All Posts</a>
        <a href="/posts/create">Create Post</a>
    </div>
    <div class="container">
        <a href="/posts" class="back-link">Back to Posts</a>
        <h1>Blog Posts</h1>
        <ul>
        @foreach($posts as $post)
            <li>
                <div class="content-row">
                    <div class="card-details">
                        <strong>{{ $post->title }}</strong><br>
                        <span>{{ $post->body }}</span>
                    </div>
                    <div class="card-actions">
                        <a href="/posts/{{ $post->id }}/edit" class="button secondary">Edit</a>
                        <form class="inline-action" action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button secondary" onclick="return confirm('Delete this post?')">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</body>
</html>
