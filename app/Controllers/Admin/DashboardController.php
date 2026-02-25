<?php

namespace App\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use Core\View;

class DashboardController {
    
    public function index(){
        $totalPosts = Post::count();
        $totalComment = Comment::count();
        $recentPosts = Post::getRecent(5);
        $recentComment = Comment::getRecent(5);


        return View::render('admin/dashboard/index',
        [
            'totalPosts' => $totalPosts,
            'totalComment' => $totalComment,
            'recentPosts' => $recentPosts,
            'recentComment' => $recentComment,
        ],
        'layouts/admin');
    }
}