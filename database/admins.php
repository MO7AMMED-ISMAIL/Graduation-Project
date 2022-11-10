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
    public function Update($id, $username , $card_id , $email ,$role_id) {
        $sql = "UPDATE $this->tableName SET username='$username' ,card_id='$card_id', .\
        email='$email',role_id='$role_id' where id= $id";
        $this->conn->query($sql);
    }
    public function Delete($id) {
        $sql = "DELETE FROM $this->tableName WHERE id=$id";
        $this->conn->query($sql);
    }
    public function Create($username , $card_id , $email , $role_id){
        $sql = "INSERT INTO $this->tableName .\
        ( username, card_id , email , role_id).\
        VALUES ('$username', '$card_id', '$email','$role_id')";
        $this->conn->query($sql);
    }

    
}

//$admin = new Admin('Admins');
//$res = $admin->Findall();
//echo $res->num_rows;
//var_dump($res);

?>