<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../Config/database.php';
 
// instantiate uitleen uitleen
include_once '../uitleen.php';
 
$database = new Database();
$db = $database->getConnection();
 
$uitleen = new Uitleen($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->Lener_ID)&&
    !empty($data->Object_ID) &&
    !empty($data->Uitleendatum) &&
    !empty($data->Inleverdatum)
){
 
    // set product property values
    $uitleen->Lener_ID = $data->Lener_ID;
    $uitleen->Object_ID = $data->Object_ID;
    $uitleen->Uitleendatum = $data->Uitleendatum;
    $uitleen->Inleverdatum = $data->Inleverdatum;
 
    // create the product
    if($uitleen->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the uitleen
        echo json_encode(array("message" => "Product was created."));
    }
 
    // if unable to create the product, tell the uitleen
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the uitleen
        echo json_encode(array("message" => "Unable to create product."));
    }
}
 
// tell the uitleen data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the uitleen
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>