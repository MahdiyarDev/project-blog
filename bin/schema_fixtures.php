<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Core\App;
use Core\DataBase;

require_once __DIR__ . '/../bootstrap.php';


$db = App::get('database');

$db->query("PRAGMA foreign_keys = OFF");

$db->query("DELETE FROM comments");
$db->query("DELETE FROM posts");
$db->query("DELETE FROM users");
$db->query("DELETE FROM remember_tokens");
$db->query("DELETE FROM sqlite_sequence WHERE name IN ('users','posts','comments')");

$users = [
[ 'name' => 'mahdiyar', 'email' => 'mahdiyar1234@gmail.com',
  'password' => password_hash('mahdiyar1234' , PASSWORD_DEFAULT),
  'role' => 'admin'
],
[ 'name' => 'mehrdad', 'email' => 'mehrdad.sh.90@gmail.com',
  'password' => password_hash('mehrdadsham1234' , PASSWORD_DEFAULT),
  'role' => 'user'
],
[ 'name' => 'ahmad', 'email' => 'ahmad@gmail.com',
  'password' => password_hash('ahmad1234' , PASSWORD_DEFAULT),
  'role' => 'user'
],
];

foreach ($users as $user) {
    User::create($user);
}

$posts = [
[ 'user_id' => 1 , 'title' => 'Welcome to my blog',
  'content' => 'this is my firt blog and first blog this Web!'
],
[ 'user_id' => 2 , 'title' => 'PHP blog and tricks',
  'content' => 'this blog very usefull for someone lear php'
],
[ 'user_id' => 3 , 'title' => 'Web Developer',
  'content' => 'this blog can usefull for some one web developer !'
],
];

foreach ($posts as $post) {
    Post::create($post);
}


$comments = [
[ 'post_id' => 1 , 'user_id' => 2 , 'content' => 'very good this is firt commet'],
['post_id' => 1 , 'user_id' => 3 , 'content' => 'welcome to this web please more blog'],
['post_id' => 2 , 'user_id' => 1 , 'content' => 'thank you this blog very usefull'],
['post_id' => 3 , 'user_id' => 2 , 'content' => 'merci absoloutly i use this'],
];


foreach ($comments as $comment) {
    Comment::create($comment);
}

$db->query("PRAGMA foreign_keys = ON");

echo "Fixtures load succesfully!\n";