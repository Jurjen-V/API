<?php
class Objects{
 
    // database connection and table name
    private $conn;
    private $table_name = "object";
 
    // object properties
    public $Object_ID;
    public $Object_naam;
    public $Object_merk;
    public $Object_type;
    public $Object_status;
    public $Categorie_ID;
    public $Object_img;
    public $Object_description;
 
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
                    Object_naam=:Object_naam, Object_merk=:Object_merk, Object_type=:Object_type, Object_status=:Object_status, Categorie_ID=:Categorie_ID, Object_img=:Object_img, Object_description=:Object_description";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->Object_naam=htmlspecialchars(strip_tags($this->Object_naam));
        $this->Object_merk=htmlspecialchars(strip_tags($this->Object_merk));
        $this->Object_type=htmlspecialchars(strip_tags($this->Object_type));
        $this->Object_status=htmlspecialchars(strip_tags($this->Object_status));
        $this->Categorie_ID=htmlspecialchars(strip_tags($this->Categorie_ID));
        $this->Object_img=htmlspecialchars(strip_tags($this->Object_img));
        $this->Object_description=htmlspecialchars(strip_tags($this->Object_description));
     
        // bind values
        $stmt->bindParam(":Object_naam", $this->Object_naam);
        $stmt->bindParam(":Object_merk", $this->Object_merk);
        $stmt->bindParam(":Object_type", $this->Object_type);
        $stmt->bindParam(":Object_status", $this->Object_status);
        $stmt->bindParam(":Categorie_ID", $this->Categorie_ID);
        $stmt->bindParam(":Object_img", $this->Object_img);
        $stmt->bindParam(":Object_description", $this->Object_description);
     
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
    public function update(){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                Object_naam = :Object_naam,
                Object_merk = :Object_merk,
                Object_type = :Object_type,
                Object_status = :Object_status,
                Categorie_ID = :Categorie_ID,
                Object_img = :Object_img,
                Object_description = :Object_description
            WHERE
                Object_ID = :Object_ID";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->Object_ID=htmlspecialchars(strip_tags($this->Object_ID));
        $this->Object_naam=htmlspecialchars(strip_tags($this->Object_naam));
        $this->Object_merk=htmlspecialchars(strip_tags($this->Object_merk));
        $this->Object_type=htmlspecialchars(strip_tags($this->Object_type));
        $this->Object_status=htmlspecialchars(strip_tags($this->Object_status));
        $this->Categorie_ID=htmlspecialchars(strip_tags($this->Categorie_ID));
        $this->Object_img=htmlspecialchars(strip_tags($this->Object_img));
        $this->Object_description=htmlspecialchars(strip_tags($this->Object_description));
        // bind new values
        $stmt->bindParam(':Object_ID', $this->Object_ID);
        $stmt->bindParam(':Object_naam', $this->Object_naam);
        $stmt->bindParam(':Object_merk', $this->Object_merk);
        $stmt->bindParam(':Object_type', $this->Object_type);
        $stmt->bindParam(':Object_status', $this->Object_status);
        $stmt->bindParam(':Categorie_ID', $this->Categorie_ID);
        $stmt->bindParam(':Object_img', $this->Object_img);
        $stmt->bindParam(':Object_description', $this->Object_description);
        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function delete(){
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE Object_ID = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->Object_ID=htmlspecialchars(strip_tags($this->Object_ID));

        // bind id of record to delete
        $stmt->bindParam(1, $this->Object_ID);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
