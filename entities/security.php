<?php
function ApiKey(){
    $server = "localhost";
    $dbname = "project_db";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM apikey";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            global $ApiKey;
            $ApiKey = $row["ApiKey"];
        }
    }
}