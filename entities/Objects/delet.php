<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../entities/objects.php';
include_once '../../entities/security.php';
ApiKey();
if($_GET['ApiKey'] == $ApiKey){
	$dbclass = new Database();
	$connection = $dbclass->getConnection();
	$objects = new objects($connection);
	$data = json_decode(file_get_contents("php://input"));
	extract($data);
	$objects->Object_naam = $data->Object_naam;
	$yourObj->delete($p['Categorie_ID']);
	if($objects->create()){
	    echo '{';
	        echo '"message": "objects was created."';
	    echo '}';
	}
	else{
	    echo '{';
	        echo '"message": "Unable to create objects."';
	    echo '}';
	}
}