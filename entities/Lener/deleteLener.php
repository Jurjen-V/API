<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// include database and object file
include_once '../Config/database.php';
include_once '../Objects/Lener.php';
// get database connection
$database = new DBClass();
$db = $database->getConnection();
// prepare product object
$lener = new Lener($db);
// get product id
$data = json_decode(file_get_contents("php://input"));
// set product id to be deleted
$lener->Lener_ID = $data->Lener_ID;
// delete the product
if($lener->deleteLener()){
    // set response code - 200 ok
    http_response_code(200);
    // tell the user
    echo json_encode(array("message" => "Deleted."));
}
// if unable to delete the product
else{
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(array("message" => "Unable to delete."));
}
