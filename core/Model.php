<?php
namespace Core;
use PDO;
use Core\App;

abstract class Model{
    protected static string $table;
    public $id;

    public static function all(): array{
        $db = App::get('database');
        return $db->fetchAll("SELECT * FROM " . static::$table , [] , static::class);
    }

    public static function find(mixed $id): ?static
{
    $db = App::get('database');
    $result = $db->fetch(
        "SELECT * FROM " . static::$table . " WHERE id = ?", 
        [$id], 
        static::class
    );
    
    return $result; // حالا fetch خودش null برمی‌گردونه اگر چیزی پیدا نکنه
}
    public static function create(array $data): static{
        $db = App::get('database');
        $columns = implode(', ' , array_keys($data));
        $placeholders = implode(', ' , array_fill(0,count($data), '?')) ;
        $sql = "INSERT INTO " . static::$table . "($columns) VALUES ($placeholders)";
        $db->query($sql, array_values($data));
        return static::find($db->lastInsertId());
    }

    public static function createFromArray(array $data): static{
        $model = new static();

        foreach($data as  $key => $value){
            if(property_exists($model , $key)){
                $model->$key = $value;

            }
        }
        return $model;
    }

    public function save(): static{
        $db = App::get('database');
        $data = get_object_vars($this);

        if(!isset($this->id)){
            unset($data['id']);
            return static::create($data);
        }

        unset($data['id']);
        $setParts = array_map(fn($columns) => "$columns = ?", array_keys($data));
        $sql = "UPDATE " . static::$table . " SET " . implode(', ' , $setParts) . " WHERE id = ?";
        $params = array_values($data);
        $params[] = $this->id;
        $db->query($sql , $params);
        return $this;
    }

    public function delete(): void{
        
        if(!isset($this->id)){
            return;
        }
        $db = App::get('database');
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        $db->query($sql , [$this->id]);
    }

    //-----------------CoPY CODE-------------------

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


    public static function count(): int{
        /** @var \Core\DataBase $db */
        $db = App::get('database');

        $query = " SELECT COUNT(*) FROM " . static::$table;
        $params = [];



        return (int) $db->query($query,[])->fetchColumn();
    }

    public static function incrementViews($id): void{
        $db = App::get('database');
        $db->query(
            "UPDATE posts SET views = views + 1 WHERE id = ?",
            [$id]
        );
    }


} 