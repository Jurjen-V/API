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
$user->id = $data->id;

// Set values
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = $data->password;
$user->created = $data->created;
$user->modified = $data->modified;
$user->ApiKey = $data->ApiKey;

// Update
if($user->update()){
    http_response_code(200);
    echo json_encode(array("message" => "User was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update user."));
}