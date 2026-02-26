<h2>Update Post</h2>

<form action="/admin/posts/<?= $post->id ?>" method="POST">
    <?= csrf_token() ?>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?= $post->title ?>" required>
    
    <label for="content">Content:</label>
    <textarea name="content" id="content"  rows="4" style="resize: none;" required><?= $post->content ?></textarea>

    <button type="submit">Edit Post</button>
</form>