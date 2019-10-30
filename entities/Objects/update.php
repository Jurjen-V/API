<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';

include_once '../../entities/objects.php';
include_once '../../entities/security.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$object = new Objects($connection);

$data = json_decode(file_get_contents("php://input"));

// Set ID
$object->Object_ID = $data->Object_ID;

// Set values
$object->Object_naam = $data->Object_naam;
$object->Object_merk = $data->Object_merk;
$object->Object_type = $data->Object_type;
$object->Object_status = $data->Object_status;
$object->Categorie_ID = $data->Categorie_ID;
$object->Object_img = $data->Object_img;
$object->Object_description = $data->Object_description;

// Update
if($object->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Object was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update object."));
}