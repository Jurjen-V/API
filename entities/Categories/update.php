<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';

include_once '../../entities/categories.php';
include_once '../../entities/security.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$categorie = new Categorie($connection);

$data = json_decode(file_get_contents("php://input"));

// Set ID property
$categorie->Categorie_ID = $data->Categorie_ID;

// Set values
$categorie->Categorie_naam = $data->Categorie_naam;

// Update
if($categorie->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Category was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update category."));
}