<?php

namespace App\Controllers;

use App\Services\CSRF;
use App\Services\Auth;
use Core\Router;
use App\Models\Comment;

class CommentController{

    public function store($id){
    if(!CSRF::verify()){
        Router::unauthorized();
    }

    $content = $_POST['content'];
        $user = Auth::user(); 
    Comment::create([
        'post_id' => $id,
        'user_id' => $user->id,
        'content' => $content
    ]);

    return Router::redirect("/post/{$id}#comments");

}

}