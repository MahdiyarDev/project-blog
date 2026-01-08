<h1>Welcome to my blog</h1>
<h2>All Posts</h2>

<form action="" method="GET">
    <input type="text" class="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search Post...">
    <button class="search-btn">Search</button>
</form>

<?= partial('_post' , ['posts' => $posts]) ?>
<?= partial('_pagination' , ['currentPage' => $currentPage , 'totalPages' => $totalPages]) ?>
