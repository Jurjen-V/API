<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/all.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$All = new All($connection);

$stmt = $All->read_all();
$count = $stmt->rowCount();

if($count > 0){


    $all = array();
    $all["all"] = array();
    $all["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "Inleverdatum" => $Inleverdatum,
              "Lener_naam" => $Lener_naam,
              "Object_naam" => $Object_naam,
              "Object_img" => $Object_img,
        );
 
        array_push($all["all"], $p);
    }

    echo json_encode($all);
}

else {

    echo json_encode(
        array("All" => array(), "count" => 0)
    );
}
   