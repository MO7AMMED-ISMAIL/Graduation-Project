<?php

namespace DB;
use mysqli;

class Database{
    public static $connection = false ;

    private function __construct(){
     
    }

    public static function connect(){
        if(!self::$connection){
            $conn = new mysqli('localhost','root','','ASPS');
            self::$connection = $conn;
        }
        return self::$connection;
    }
    
}

?>


