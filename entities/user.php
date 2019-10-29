<?php
class Users{
 
    // database connection and table name
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $created;
    public $modified;
    public $ApiKey;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // create product
    function create(){
     
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    firstname=:firstname, lastname=:lastname, email=:email, password=:password, created=:created, modified=:modified, ApiKey=:ApiKey";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->modified=htmlspecialchars(strip_tags($this->modified));
        $this->ApiKey=htmlspecialchars(strip_tags($this->ApiKey));
     
        // bind values
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":modified", $this->modified);
        $stmt->bindParam(":ApiKey", $this->ApiKey);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }
    // read categories
    function read(){
     
        // select all query
        $query = "SELECT * FROM ". $this->table_name ."";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

    function delete(){
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
