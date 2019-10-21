<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/Lener.php';

$dbclass = new Database();

$connection = $dbclass->getConnection();
$Lener = new Leners($connection);

$stmt = $Lener->read();
$count = $stmt->rowCount();

if($count > 0){
  $Lener = array();
  $Lener["body"] = array();
  $Lener["count"] = $count;


  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $p  = array(
      "Lener_ID" => $Lener_ID,
      "Lener_naam" => $Lener_naam,
      "Lener_mobiel" => $Lener_mobiel,
      "Lener_email" => $Lener_email,
      "Lener_afd" => $Lener_afd
    );
    array_push($Lener["body"], $p);
  }

  echo json_encode($Lener);
}
else {
  echo json_encode(
    
    array(Lener => array(), "count" => 0)
  );
}