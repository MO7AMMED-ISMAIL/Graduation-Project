<?php
namespace base;
use PDO;
use PDOException;

class Database{
    static protected $connection = false ;
    private $server = 'localhost';
    private $root = "root";
    private $pass = "";
    private $Db = "asps";

    private function __construct(){}

    public static function connect(){
        if(!self::$connection){
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=asps", 'root', '');
            } catch (PDOException $e) {
                die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
            }
        }
        return self::$connection;
    }
        
}

?>


