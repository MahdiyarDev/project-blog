<h1>Welcome to my blog | <?= $user->name ?></h1>
<h2>Recent Post</h2>

<?= partial('_post' , ['posts' => $posts]) ?>