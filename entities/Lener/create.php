<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../Config/database.php';
 
// instantiate lener lener
include_once '../lener.php';
 
$database = new Database();
$db = $database->getConnection();
 
$lener = new Leners($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->Lener_naam)&&
    !empty($data->Lener_mobiel) &&
    !empty($data->Lener_email) &&
    !empty($data->Lener_afd)
){
 
    // set product property values
    $lener->Lener_naam = $data->Lener_naam;
    $lener->Lener_mobiel = $data->Lener_mobiel;
    $lener->Lener_email = $data->Lener_email;
    $lener->Lener_afd = $data->Lener_afd;
 
    // create the product
    if($lener->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the lener
        echo json_encode(array("message" => "Product was created."));
    }
 
    // if unable to create the product, tell the lener
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the lener
        echo json_encode(array("message" => "Unable to create product."));
    }
}
 
// tell the lener data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the lener
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>