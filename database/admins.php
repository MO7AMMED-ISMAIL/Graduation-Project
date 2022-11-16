<?php
namespace TableAdmin;
include "base.php";
use DB ;

class Admin extends DB\Database{
    public $tableName ;
    private $conn =  DB\Database::connect();
    public function __construct($table){
        $this->tableName = $table;
        if(!$this->conn){
            echo $this->conn->error;
        }
    }
    public function Findall(){
        $sql = "select * from $this->tableName";
        $res = $this->conn->query($sql);
        $result = $res->fetch_assoc();
        $this->conn->close();
        return $result;
    }

    public function FindById($id){
        $sql = "select * from $this->tableName where id= $id";
        $res = $this->conn->query($sql);
        $result = $res->fetch_assoc();
        $this->conn->close();
        return $result;
    }
    public function Delete($id) {
        $sql = "DELETE FROM $this->tableName WHERE id=$id";
        $this->conn->query($sql);
        $this->conn->close();
    }

    public function Update($sql) {
        $this->conn->query($sql);
        $this->conn->close();
    }

    public function Create($sql){
        $this->conn->query($sql);
        $this->conn->close();
    }

    public function innerJoin($sql){
        $res = $this->conn->query($sql);
        $result = $res->fetch_assoc();
        $this->conn->close();
        return $result;
    }
    
}

//$admin = new Admin('Admins');
//$res = $admin->Findall();
//echo $res->num_rows;
//var_dump($res);

?>