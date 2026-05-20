<?php
require_once 'repositoryFunction.php';

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'todolist-db');
define('DB_USERNAME', 'user');
define('DB_PASSWORD', 'password');

function connexion() : PDO {
    try {
        $database = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    } catch (PDOException $e){
        die('Erreur: '.$e->getMessage(). '</br>');
    }
    return $database;
}

$database = connexion();

function readListT(){
    $stmt = $database->prepare('SELECT * FROM todolist');
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            http_response_code(201);
            return json_encode($result);
}

function insertList(){
    $body = json_decode(file_get_contents('php://input'), true); 
            $stmt = $database->prepare('INSERT INTO todo (title, description, done) VALUES (:title, :description, :done)'); //Paramétres nommés
            $stmt->execute([
                ':title' => $body['title'],
                ':description' => $body['description'],
                ':done' => $body['done']
            ]);
            http_response_code(201);
                return echo json_encode(["message" => "Created - ressource créée avec succès"]);
}

function actPUT(){
    $body = json_decode(file_get_contents('php://input'), true); 
            $stmt = $database->prepare("UPDATE todo SET title = :title, description = :description, done = :done WHERE id = :id");
            $stmt->execute([
                ':title' => $body['title'],
                ':description' => $body['description'],
                ':done' => $body['done']
            ]);
            http_response_code(200);
                return echo json_encode(["message" => "Update - ressource créée avec succès"]);
}