<?php
class Categorie{
 
    // database connection and table name
    private $conn;
    private $table_name = "categorie";
 
    // object properties
    public $Categorie_ID;
    public $Categorie_naam;
 
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
                    Categorie_naam=:Categorie_naam";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->Categorie_naam=htmlspecialchars(strip_tags($this->Categorie_naam));
     
        // bind values
        $stmt->bindParam(":Categorie_naam", $this->Categorie_naam);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }
    // read categories
    function read(){
     
        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";
     
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
                Categorie_naam = :Categorie_naam
            WHERE
                Categorie_ID = :Categorie_ID";
        // prepare query statement
        $stmt = $this->connection->prepare($query);
        // sanitize
        $this->Categorie_naam=htmlspecialchars(strip_tags($this->Categorie_naam));
        $this->Categorie_ID=htmlspecialchars(strip_tags($this->Categorie_ID));
        // bind new values
        $stmt->bindParam(':Categorie_naam', $this->Categorie_naam);
        $stmt->bindParam(':Categorie_ID', $this->Categorie_ID);
        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

}
