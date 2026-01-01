<?php
require_once __DIR__ . '/../bootstrap.php'; 
use Core\App;
$db = App::get('database');
$schemaFile = __DIR__ . '/../database/schema.sql';
$sql = file_get_contents($schemaFile);

try{
    
    $parts = explode(separator: ';' , string: $sql);
    var_dump($parts);die;
}catch(Exception $e){
    echo "Error loading schema: " . $e->getMessage() . "\n";
}