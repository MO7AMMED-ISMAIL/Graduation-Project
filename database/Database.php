<?php
namespace TableAdmin;
include "base.php";
use DB ;

class Database extends DB\Database{

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

    public function Update(array $values , $id)
    {

        $sentence = ''; 

        foreach ($values as $key => $value) {
            $sentence .= $key . " = " . "'" . $value . "' ,"; 
        }

        $sentence = rtrim($sentence ,',') ;

        $update = "UPDATE {$this->tableName} SET {$sentence} WHERE id = $id";

        $this->conn ->query($update);
    }
   
   

    public function Insert(array $values)
    {
        $keys = array_keys($values);
        $keys = implode(',', $keys);

        $value = array_values($values);
        $value = "'".implode("','" , $value)."'";

        $insert = "INSERT INTO {$this->tableName} ({$keys}) VALUES ({$value})";
        
        $this->conn->query($insert);
    }

}

//$admin = new Admin('Admins');
//$res = $admin->Findall();
//echo $res->num_rows;
//var_dump($res);

?>