<?php

namespace App\Controllers;

use App\Services\CSRF;
use App\Services\Auth;
use Core\Router;
use App\Models\Comment;

class CommentController{

    public function store($id){
   


    $content = $_POST['content'];

    Comment::create([
        'post_id' => $id,
        'user_id' => Auth::user()->id,
        'content' => $content
    ]);

    return Router::redirect("/post/{$id}#comments");

}

}