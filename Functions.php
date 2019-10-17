<?php
$server = "localhost";
$dbname = "project_db";
$username = "root";
$password = "";

function Categorie(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM categorie";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output = array("Categorie ID: " . $row["Categorie_ID"], "Categorie naam: " . $row["Categorie_naam"]);
            $json = json_encode($output) . ",";
            echo $json . "<br>";
        }
    }
}
function User(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output = array("id: " .$row["id"], "Firstname: " . $row['firstname'], "Lastname: " . $row["lastname"], "Email: " . $row["email"], "Password: " . $row["password"], "Created: " . $row["created"], "Modified: " . $row["modified"]);
            $json = json_encode($output) . ", ";
            echo $json . "<br>";
        }
    }
}
function Lener(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM lener";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output = array("Lener ID: " . $row["Lener_ID"], "Lener naam: " . $row["Lener_naam"], "Lener mobiel: " . $row["Lener_mobiel"], "Lener email: " . $row["Lener_email"], "lener afdeling: " . $row["Lener_afd"]);
            $json = json_encode($output) . ", ";
            echo $json . "<br>";
        }
    }
}
function Object(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM object";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output = array("Object ID: " . $row["Object_ID"], "Object naam: " . $row["Object_naam"], "Object merk: " . $row["Object_merk"], "Object type: " . $row["Object_type"], "Object status: " . $row["Object_status"], "Categorie ID: " . $row["Categorie_ID"]);
            $json = json_encode($output) . ", ";
            echo $json . "<br>";
        }
    }
}
function Uitleen(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM uitleen";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output = array("Uitleen ID: " . $row["Uitleen_ID"], "Lener ID: " . $row["Lener_ID"], "Object ID: " . $row["Object_ID"], "Uitleendatum: " . $row["Uitleendatum"], "Inleverdatum: " . $row["Inleverdatum"]);
            $json = json_encode($output) . ", ";
            echo $json . "<br>";
        }
    }
}
function ObjectLend(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE object SET Object_status='1' WHERE Object_ID= ".$_GET['Object_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully" . "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function ObjectReturn(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE object SET Object_status='0' WHERE Object_ID= ".$_GET['Object_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function changeCategorie(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE categorie SET Categorie_naam = . '$Categorie_naam' WHERE Categorie_ID= ".$_GET['Categorie_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function makeCategorie(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO categorie (Categorie_naam) values('".$_GET['Categorie_naam']."')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function deleteCategorie(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM categorie WHERE Categorie_ID= ".$_GET['Categorie_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function addLener(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO lener (Lener_naam, Lener_mobiel, Lener_email, Lener_afd) values('".$_GET['Lener_naam']."', '".$_GET['Lener_mobiel']."', '".$_GET['Lener_email']."', '".$_GET['Lener_afd']."')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function addObject(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO object (Object_naam, Object_merk, Object_type, Object_status, Categorie_ID) values('".$_GET['Object_naam']."', '".$_GET['Object_merk']."', '".$_GET['Object_type']."', '".$_GET['Object_status']."', '".$_GET['Categorie_ID']."')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function changeObject(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE Object SET Object_naam = ".$_GET['Object_naam'].", Object_merk = ".$_GET['Object_merk']." , Object_type = ".$_GET['Object_type'].", Object_status = ".$_GET['Object_status'].", Categorie_ID = ".$_GET['Categorie_ID']." WHERE Object_ID= ".$_GET['Object_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function deleteObject(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM Object WHERE Object_ID= ".$_GET['Object_ID'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function addUitleen(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO uitleen (Lener_ID, Object_ID, Uitleendatum, Inleverdatum) values('".$_GET['Lener_ID']."', '".$_GET['Object_ID']."', '".$_GET['Uitleendatum']."', '".$_GET['Inleverdatum']."')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function addUser(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $ApiKey = generateRandomString();
    $hash = password_hash($_GET['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (firstname, lastname, email, password, ApiKey) values('".$_GET['firstname']."', '".$_GET['lastname']."', '".$_GET['email']."', '".$hash."', '".$ApiKey."')";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function changeUser(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $hash = password_hash($_GET['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE user SET firstname = ".$_GET['firstname'].", lastname = ".$_GET['lastname']." , email = ".$_GET['email'].", password = ".$hash." WHERE id= ".$_GET['id'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function deleteUser(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM user WHERE id= ".$_GET['id'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully". "<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
function ApiKey(){
    global $server;
    global $dbname;
    global $username;
    global $password;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ApiKey FROM user WHERE id = ".$_GET['id'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            global $ApiKey;
            $ApiKey = $row["ApiKey"];
        }
    }
}
ApiKey();
if($_GET['ApiKey'] == $ApiKey){
    if($_GET['categorie'] == 1){
        categorie();
    }
    if($_GET['lener'] == 1){
        lener();
    }
    if($_GET['object'] == 1){
        object();
    }
    if($_GET['changeObject'] == 1){
        changeObject();
    }
    if($_GET['uitleen'] == 1){
        uitleen();
    }
    if($_GET['users'] == 1){
        user();
    }
    if($_GET['addUitleen'] == 1){
        addUitleen();
    }
    if($_GET['addUser'] == 1){
        addUser();
    }
    if($_GET['changeUser'] == 1){
        changeUser();
    } 
    if($_GET['deleteUser'] == 1){
        deleteUser();
    }
}else{
    if($_GET['categorie'] == 1){
        categorie();
    }
    if($_GET['object'] == 1){
        object();
    }
}
?>
