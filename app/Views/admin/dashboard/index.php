<h2>Welcome to Admin Panel</h2>

<section class="section-admin">
    <h3>Status</h3>
    <p>Total Post: <?= $totalPosts ?></p>
    <p>Total Comment: <?= $totalComment ?></p>
</section>

<section  class="section-admin">
    <h3>Recent Post</h3>
    <ul>
        <?php foreach($recentPosts as $post): ?>
            <li>
                <a href="/post/<?= $post->id ?>">
                    <?= htmlspecialchars($post->title) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>


<section  class="section-admin">
    <h3>Recent Comment</h3>
    <ul>
        <?php foreach($recentComment as $commnet): ?>
            <li>
                <a href="/post/<?= $commnet->post_id ?>">
                  <?= htmlspecialchars(substr($commnet->content , 0,10)) ?>
                   ...
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>


