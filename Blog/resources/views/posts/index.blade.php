<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/posts" class="back-link">
            Back to Posts
        </a>
        <h1>Blog Posts</h1>
        <ul>
        @foreach($posts as $post)
            <li>
                <div class="content-row">
                    <div class="card-details">
                        <strong>{{ $post->title }}</strong><br>
                        <span>{{ $post->body }}</span><br>
                        <em>Comments:</em>
                        <div class="post-comments">
                            {{ $post->comments }}
                        </div>
                    </div>
                    <div class="card-actions">
                        <a href="/posts/{{ $post->id }}/edit" class="edit-btn" title="Edit post">
                            <!-- SVG ICON -->
                            Edit
                        </a>
                        <form class="inline-action" action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Delete post" onclick="return confirm('Delete this post?')">
                                <!-- SVG ICON -->
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</body>
</html>
