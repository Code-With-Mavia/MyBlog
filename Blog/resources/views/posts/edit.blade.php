<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/posts" class="back-link">
            Back to Posts
        </a>
        <h1>Edit Post</h1>
        <form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <label>Body:</label>
    <textarea name="body" required>{{ $post->body }}</textarea>
    <label>Category:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <label>Comments:</label>
    <textarea name="comments" required>{{ $post->comments }}</textarea>
    <div class="form-actions">
        <button type="submit" class="edit-btn">
            Update
        </button>
    </div>
</form>

    </div>
</body>
</html>
