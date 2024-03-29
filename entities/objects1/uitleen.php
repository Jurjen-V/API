<?php
class Uitleen{
 
    // database connection and table name
    private $conn;
    private $table_name = "uitleen";
 
    // object properties
    public $Uitleen_ID;
    public $Lener_ID;
    public $Object_ID;
    public $Uitleendatum;
    public $Inleverdatum;
 
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
                    Lener_ID=:Lener_ID, Object_ID=:Object_ID, Uitleendatum=:Uitleendatum, Inleverdatum=:Inleverdatum";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->Lener_ID=htmlspecialchars(strip_tags($this->Lener_ID));
        $this->Object_ID=htmlspecialchars(strip_tags($this->Object_ID));
        $this->Uitleendatum=htmlspecialchars(strip_tags($this->Uitleendatum));
        $this->Inleverdatum=htmlspecialchars(strip_tags($this->Inleverdatum));
     
        // bind values
        $stmt->bindParam(":Lener_ID", $this->Lener_ID);
        $stmt->bindParam(":Object_ID", $this->Object_ID);
        $stmt->bindParam(":Uitleendatum", $this->Uitleendatum);
        $stmt->bindParam(":Inleverdatum", $this->Inleverdatum);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }
}
