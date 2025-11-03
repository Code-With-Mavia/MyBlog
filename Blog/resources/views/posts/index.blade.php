<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="navbar">
    <a href="/posts">All Posts</a>
    <a href="/posts/create">Create Post</a>
</div>
<h1>Blog Posts</h1>
<ul>
@foreach($posts as $post)
    <li>
        <div class="content-row">
            <div class="card-details">
                <strong>{{ $post->title }}</strong><br>
                {{ $post->body }}
            </div>
            <div class="card-actions">
                <a href="/posts/{{ $post->id }}/edit">Edit</a>
                <form class="inline-action" action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this post?')">Delete</button>
                </form>
            </div>
        </div>
    </li>
@endforeach
</ul>
</body>
</html>
