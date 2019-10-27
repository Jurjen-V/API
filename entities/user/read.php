<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../../Config/database.php';
include_once '../../entities/user.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$Users = new Users ($connection);

$stmt = $Users->read();
$count = $stmt->rowCount();

if($count > 0){


    $Users = array();
    $Users["Users"] = array();
    $Users["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id" => $id,
              "firstname" => $firstname,
              "lastname" => $lastname,
              "email" => $email,
              "password" => $password,
              "created" => $created,
              "modified" => $modified,
              "ApiKey" => $ApiKey
        );
 
        array_push($Users["Users"], $p);
    }

    echo json_encode($Users);
}

else {

    echo json_encode(
        array("Users" => array(), "count" => 0)
    );
}