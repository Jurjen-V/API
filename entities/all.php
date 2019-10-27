<?php
class All{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "All";

    // table columns

    public $Lener_naam;

    public $Object_naam;
    public $Object_img;

    public $Inleverdatum;
    

    public function __construct($connection){
        $this->connection = $connection;
    }

    //R
    public function read_all(){
        $query = "SELECT uitleen.Inleverdatum, lener.Lener_naam, object.Object_naam, object.Object_img FROM ((uitleen INNER JOIN lener ON uitleen.Lener_ID = Lener.Lener_ID) INNER JOIN object ON uitleen.Object_ID = object.Object_ID)";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    } 
}