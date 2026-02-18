<?php

namespace App\Models;
use Core\App;
use Core\Model;

class Post extends Model{
    protected static string $table = 'posts';

    public $id;
    public $user_id;
    public $title;
    public $content;
    public $views;
    public $created_at;

    
    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null)
{
    $db = App::get('database');

    $query = "SELECT * FROM " . static::$table;
    $params = [];

    if ($search !== null && trim($search) !== '') {
        $query .= " WHERE title LIKE ? OR content LIKE ?";
        $params[] = "%$search%";
        $params[] = "%$search%";
    }

    $query .= " ORDER BY created_at DESC";

    if ($limit !== null && $page !== null) {
        $limit  = (int) $limit;
        $offset = (int) (($page - 1) * $limit);
        $query .= " LIMIT $limit OFFSET $offset";
    }

    return $db->fetchAll($query, $params, static::class);
}


    public static function count(?string $search = null): int{
        /** @var \Core\DataBase $db */
        $db = App::get('database');

        $query = " SELECT COUNT(*) FROM " . static::$table;
        $params = [];

        if($search !== null && trim($search) !== ''){
            $query .= " WHERE title LIKE ? OR content LIKE ?";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }


        return (int) $db->query($query,$params)->fetchColumn();
    }

    public static function incrementViews($id): void{
        $db = App::get('database');
        $db->query(
            "UPDATE posts SET views = views + 1 WHERE id = ?",
            [$id]
        );
    }
}
