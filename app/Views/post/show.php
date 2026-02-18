
<article class="article-blog">
    <h1 class="title-blog"><?= htmlspecialchars($post->title); ?></h1>
    <p class="view-blog">Views: <?= $post->views ?></p>
    <p class="content-blog">
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</article>

<section>
    <h2>Comments</h2>

    <?php if($user): ?>

    <?php else: ?>
    
    <p><a href="/login">Login for comment</a></p>
    
    <?php endif; ?>

    <?php foreach($comments as $comment): ?>
        <div class="div-comment">
            <p class="p-comment">
                <?= nl2br(htmlspecialchars($comment->content)) ?>
            </p>
            <small>Posted on: <?= $comment->created_at ?></small>
        </div>
    <?php endforeach; ?>
</section>