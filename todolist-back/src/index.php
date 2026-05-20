<?php
require_once 'model.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);


global $database;
switch(true){
    case $method == 'GET' && $_GET["action"] == "/todolist":
        echo readList($database);
        break;
        
    case $method == 'POST' && $uri == "/todolist" :
        function insertList();
            break;

    case $method == 'PUT' && $uri == "/todolist/{uuid}/todo" :
        function updList();
    
    default : 
        http_response_code(404);
        echo json_encode(["message" => "Route non trouvée"]);

    case $method == 'POST' && $uri == "/todolist":
        insertList();
        break;

    default:
        http_response_code(404);
        echo json_encode(["message" => "Route non trouvée"]);
}
// switch ($method) { 
//     case 'GET': 
//         if ($uri === "/todo"){ //Preparation/exécution/récupération des résultat
//             $stmt = $database->prepare('SELECT * FROM todo');
//             $stmt->execute();
//             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         } else {
//             http_response_code(404);
//                 echo json_encode(["message" => "Route non trouvée"]);
//         }
//         break; 

//     case 'POST': 
//         if($uri === "/todolist"){
//             $body = json_decode(file_get_contents('php://input'), true); 
//             $stmt = $database->prepare('INSERT INTO todo (title, description, done) VALUES (:title, :description, :done)'); //Paramétres nommés
//             $stmt->execute([
//                 ':title' => $body['title'],
//                 ':description' => $body['description'],
//                 ':done' => $body['done']
//             ]);
//             http_response_code(201);
//                 echo json_encode(["message" => "Created - ressource créée avec succès"]);
//         } else {
//            http_response_code(404);
//                 echo json_encode(["message" => "Route non trouvée"]); 
//         }
//         break;

//     case 'PUT': //Modification de la page existante / Même strucutre que pour le POST
//         if($uri == "/todolist/{uuid}/todo"){
//             $body = json_decode(file_get_contents('php://input'), true); 
//             $stmt = $database->prepare("UPDATE todo SET title = :title, description = :description, done = :done WHERE id = :id");
//             $stmt->execute([
//                 ':title' => $body['title'],
//                 ':description' => $body['description'],
//                 ':done' => $body['done']
//             ]);
//             http_response_code(200);
//                 echo json_encode(["message" => "Update - ressource créée avec succès"]);
//         } else{
//             http_response_code(404);
//                 echo json_encode(["message" => "Route non trouvée"]);
//         }
//         break; 
//     case 'DELETE': 
//         break; 
//     case 'PATCH': 
//         break;
//     default:
//         break;
// }
?>