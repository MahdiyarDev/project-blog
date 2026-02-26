<?php

namespace App\Controllers\Admin;

use App\Models\Post;

use App\Services\Auth;
use App\Services\Authorization;
use Core\Model;
use Core\Router;
use Core\View;

class PostController{
    

    public function index(){
        Authorization::verify('dashboard');
        
        return View::render(
            'admin/post/index',
            ['posts' => Post::all()],
            'layouts/admin'
        );
    }

    public function create(){
        Authorization::verify('create_post');

         return View::render(
           template: 'admin/post/create',
            layout: 'layouts/admin'
        );
    }

    public function store(){
        Authorization::verify('create_post');
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => Auth::user()->id,
        ];

        Post::create($data);
        Router::redirect('/admin/posts');
    }

    public function edit($id){
        $post = Post::find($id);
        Authorization::verify('edit_post' , $post);
        return View::render(
            'admin/post/edit',
            ['post' => $post ],
            'layouts/admin'
        );
    }

    public function update($id){
        $post = Post::find($id);
        Authorization::verify('edit_post' , $post);


        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->save();

        Router::redirect('/admin/posts');
    }

    public function delete($id){        
    $post = Post::find($id);
    Authorization::verify('delete_post' , $post);

    $post->delete();
    Router::redirect('/admin/posts');
    }

}