<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/uitleen.php';

$dbclass = new Database();

$connection = $dbclass->getConnection();
$Uitleen = new Uitleen($connection);

$stmt = $Uitleen->read();
$count = $stmt->rowCount();

if($count > 0){
  $Uitleen = array();
  $Uitleen["body"] = array();
  $Uitleen["count"] = $count;

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $p  = array(
      "Uitleen_ID" => $Uitleen_ID,
      "Lener_ID" => $Lener_ID,
      "Object_ID" => $Object_ID,
      "Uitleendatum" => $Uitleendatum,
      "Inleverdatum" => $Inleverdatum,
    );
    array_push($Uitleen["body"], $p);
  }

  echo json_encode($Uitleen);
}
else {
  echo json_encode(
    array(Uitleen => array(), "count" => 0)
  );
}