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
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                ORDER BY
                    p.created DESC";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

}
