<?php
class Leners{
 
    // database connection and table name
    private $conn;
    private $table_name = "lener";
 
    // object properties
    public $Lener_ID;
    public $Lener_naam;
    public $Lener_mobiel;
    public $Lener_email;
    public $Lener_afd;
 
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
                    Lener_naam=:Lener_naam, Lener_mobiel=:Lener_mobiel, Lener_email=:Lener_email, Lener_afd=:Lener_afd";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->Lener_naam=htmlspecialchars(strip_tags($this->Lener_naam));
        $this->Lener_mobiel=htmlspecialchars(strip_tags($this->Lener_mobiel));
        $this->Lener_email=htmlspecialchars(strip_tags($this->Lener_email));
        $this->Lener_afd=htmlspecialchars(strip_tags($this->Lener_afd));
     
        // bind values
        $stmt->bindParam(":Lener_naam", $this->Lener_naam);
        $stmt->bindParam(":Lener_mobiel", $this->Lener_mobiel);
        $stmt->bindParam(":Lener_email", $this->Lener_email);
        $stmt->bindParam(":Lener_afd", $this->Lener_afd);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }
    public function update(){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                Lener_naam = :Lener_naam,
                Lener_mobiel = :Lener_mobiel,
                Lener_email = :Lener_email,
                Lener_afd = :Lener_afd
            WHERE
                Lener_ID = :Lener_ID";
        // prepare query statement
        $stmt = $this->connection->prepare($query);
        // sanitize
        $this->Lener_ID=htmlspecialchars(strip_tags($this->Lener_ID));
        $this->Lener_naam=htmlspecialchars(strip_tags($this->Lener_naam));
        $this->Lener_mobiel=htmlspecialchars(strip_tags($this->Lener_mobiel));
        $this->Lener_email=htmlspecialchars(strip_tags($this->Lener_email));
        $this->Lener_afd=htmlspecialchars(strip_tags($this->Lener_afd));
        // bind new values
        $stmt->bindParam(':Lener_ID', $this->Lener_ID);
        $stmt->bindParam(':Lener_naam', $this->Lener_naam);
        $stmt->bindParam(':Lener_mobiel', $this->Lener_mobiel);
        $stmt->bindParam(':Lener_email', $this->Lener_email);
        $stmt->bindParam(':Lener_afd', $this->Lener_afd);
        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
