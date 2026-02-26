<?php

namespace App\Services;

use App\Services\Auth; 
use App\Models\Post;
use Core\Router;

class Authorization{

    public static function verify(string $action, mixed $resource = null): void{
        if(!static::check($action,$resource)){
            Router::forbidden();
        }
    }

    public static function check(string $action, mixed $resource = null): bool{
        $user = Auth::user();

        if(!$user){
            return false;
        }

        if('superAdmin' === $user->role){
            return true;
        }

        // return match($action){
        //     'dashboard' => in_array($user->role , ['admin' , 'superAdmin']),
        //     'edit_post', 'delete_post' => $resource instanceof Post && (($user->id === $resource->user_id) || in_array($user->role , ['admin' , 'superAdmin'])),
        //     'comment' , 'create_post' => true,
        //     default => false
        // };
        return match($action){
          'dashboard' => in_array($user->role, ['admin', 'superAdmin']),
          'edit_post' => $resource instanceof Post && (($user->id === $resource->user_id) || in_array($user->role, ['admin', 'superAdmin'])),
          'delete_post' => $resource instanceof Post && (($user->id === $resource->user_id) || in_array($user->role, ['admin', 'superAdmin'])),
          'comment' => true,
          'create_post' => true,
          default => false
};
    }
}