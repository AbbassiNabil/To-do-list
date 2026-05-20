<?php
require_once 'repositoryFunction.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$database = connexion();//Fonction de connexion
switch ($method) { 
    case 'GET': 
        if ($uri === "/todo"){ //Preparation/exécution/récupération des résultat
            $stmt = $database->prepare('SELECT * FROM todo');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            http_response_code(404);
                echo json_encode(["message" => "Route non trouvée"]);
        }
        break; 

    case 'POST': 
        if($uri === "/todolist"){
            $body = json_decode(file_get_contents('php://input'), true); 
            $stmt = $database->prepare('INSERT INTO todo (title, description, done) VALUES (:title, :description, :done)'); //Paramétres nommés
            $stmt->execute([
                ':title' => $body['title'],
                ':description' => $body['description'],
                ':done' => $body['done']
            ]);
            http_response_code(201);
                echo json_encode(["message" => "Created - ressource créée avec succès"]);
        } else {
           http_response_code(404);
                echo json_encode(["message" => "Created - Route non trouvée"]); 
        }
        break;
    case 'PUT': 
        break; 
    case 'DELETE': 
        break; 
    case 'PATCH': 
        break;
    default:
        break;
}