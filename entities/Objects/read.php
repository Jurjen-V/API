<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/objects.php';

$dbclass = new DBClass();

$connection = $dbclass->getConnection();
$Objects = new Objects($connection);

$stmt = $Objects->read();
$count = $stmt->rowCount();

if($count > 0){
  $Objects = array();
  $Objects["body"] = array();
  $Objects["count"] = $count;

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $p  = array(
      "Object_ID" => $Object_ID,
      "Object_naam" => $Object_naam,
      "Object_merk" => $Object_merk,
      "Object_type" => $Object_type,
      "Object_status" => $Object_status,
      "Categorie_ID" => $Categorie_ID,
      "Object_img" => $Object_img,
      "Object_description" => $Object_description
    );
    array_push($Objects["body"], $p);
  }

  echo json_encode($Objects);
}
else {
  echo json_encode(
    array(Objects => array(), "count" => 0)
  );
}