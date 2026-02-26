<h2>Create New Post</h2>

<form action="/admin/posts" method="POST">
    <?= csrf_token() ?>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    
    <label for="content">Content:</label>
    <textarea name="content" id="content" rows="4" style="resize: none;" required></textarea>

    <button type="submit">Post</button>
</form>