<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/categories.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$Categories = new Categories($connection);

$stmt = $Categories->read();
$count = $stmt->rowCount();

if($count > 0){


    $Categories = array();
    $Categories["Categories"] = array();
    $Categories["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "Categorie_ID" => $Categorie_ID,
              "Categorie_naam" => $Categorie_naam
        );
 
        array_push($Categories["Categories"], $p);
    }

    echo json_encode($Categories);
}

else {

    echo json_encode(
        array("Categories" => array(), "count" => 0)
    );
}