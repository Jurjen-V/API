<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';

include_once '../../entities/uitleen.php';
include_once '../../entities/security.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();


$uitleen = new Uitleen($connection);

$data = json_decode(file_get_contents("php://input"));

// Set ID property
$uitleen->Uitleen_ID = $data->Uitleen_ID;

//Set values
$uitleen->Lener_ID = $data->Lener_ID;
$uitleen->Object_ID = $data->Object_ID;
$uitleen->Uitleendatum = $data->Uitleendatum;
$uitleen->Inleverdatum = $data->Inleverdatum;

// Update
if($uitleen->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Loaned item was updated."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update loaned item."));
}