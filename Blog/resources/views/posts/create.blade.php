<!DOCTYPE html>
<html>
<head>
    <title>Add a New Post</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/posts" class="back-link">
            Back to Posts
        </a>
        <h1>Add a New Post</h1>
        <form method="POST" action="/posts">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Body:</label>
    <textarea name="body" required></textarea>
    <label>Category:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <label>Comments:</label>
    <textarea name="comments" required></textarea>
    <div class="form-actions">
        <button type="submit" class="edit-btn">
            Create
        </button>
    </div>
</form>

    </div>
</body>
</html>
