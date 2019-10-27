<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../entities/user.php';
include_once '../../entities/security.php';
$dbclass = new Database();
$connection = $dbclass->getConnection();
$user = new Users($connection);
$data = json_decode(file_get_contents("php://input"));
// Set ID
$user->Us = $data->Object_ID;
// Set values
// Update
if($object->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Object was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update category."));
}