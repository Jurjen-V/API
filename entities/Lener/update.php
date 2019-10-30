<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';

include_once '../../entities/lener.php';
include_once '../../entities/security.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();


$lener = new Leners($connection);

$data = json_decode(file_get_contents("php://input"));

// Set ID property
$lener->Lener_ID = $data->Lener_ID;

//Set values
$lener->Lener_naam = $data->Lener_naam;
$lener->Lener_mobiel = $data->Lener_mobiel;
$lener->Lener_email = $data->Lener_email;
$lener->Lener_afd = $data->Lener_afd;
// Update
if($lener->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Lener was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update lener."));
}