<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../Config/database.php';
 
// instantiate object object
include_once '../object.php';
 
$database = new Database();
$db = $database->getConnection();
 
$Object = new Object($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->Object_naam)&&
    !empty($data->Object_merk) &&
    !empty($data->Object_type) &&
    !empty($data->Object_status) &&
    !empty($data->Categorie_ID) &&
    !empty($data->Object_img)&&
    !empty($data->Object_description)
){
 
    // set product property values
    $Object->Object_naam = $data->Object_naam;
    $Object->Object_merk = $data->Object_merk;
    $Object->Object_type = $data->Object_type;
    $Object->Object_status = $data->Object_status;
    $Object->Categorie_ID = $data->Categorie_ID;
    $Object->Object_img = $data->Object_img;
    $Object->Object_description = $data->Object_description;
 
    // create the product
    if($Object->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>