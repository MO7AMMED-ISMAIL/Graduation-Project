<?php
namespace DbClass;
require "connect.php";
use base\Database;
use Error;
use PDO;

class Table extends Database{

    public $TbName;
    //private $conn = parent::connect();
    public function __construct($tableName)
    {
        $this->TbName = $tableName;
    }
    public function FindAll(){
        $sql = "SELECT * FROM {$this->TbName}";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll();
        return $result;
    }

    public function FindById($id){
        $sql = "SELECT * FROM {$this->TbName} WHERE id=:id";
        $Sel = parent::connect()->prepare($sql);
        $Sel->execute(['id' => $id]);
        $result = $Sel->fetch();
        return $result;
    }

    public function Delete($id) {
        $stmt = parent::connect()->prepare("DELETE * FROM {$this->TbName} WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }

    public function Update(array $values , $id){
        $sentence = ''; 
        foreach ($values as $key => $value) {
            $sentence .= "{$key} = {$value} ,"; 
        }
        $sentence = rtrim($sentence ,',') ;
        $sql = "UPDATE {$this->TbName} SET {$sentence} WHERE id = $id";
        $stmt = parent::connect()->prepare($sql);
        $stmt = $stmt->execute();
    }

    public function Create(array $values){
        $keys = array_keys($values);
        $keys = implode(',', $keys);
        $value = array_values($values);
        $value = "'".implode("','" , $value)."'";
        $sql = "INSERT INTO {$this->TbName} ({$keys}) VALUES ({$value})";
        $stmt = parent::connect()->prepare($sql);
        $stmt = $stmt->execute();
    }

    public function input_data($data) { 
        if(strlen($data)){
            throw new Error("The input is empty");
        }
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
    }  
    public function ValidateEmail($data){
        if(filter_var($data, FILTER_VALIDATE_EMAIL)){
            return $data;
        }else{
            return new Error("is not valid Mail");
        }
    }

    public function InnerJoin($tableName , $atrr ){
        $sql = "SELECT * FROM {$this->TbName} INNER JOIN {$tableName} ON {$this->TbName}.role_id = {$tableName}.id ";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
/* 
    $admin = new Table('admins');
    $user = $admin->FindAll();
    echo "<pre>";
    print_r($user);
    echo "</pre>";
*/
// $admin = new Table('admins');
// $user = $admin->InnerJoin('roles' , 'role_id');
// echo "<pre>";
// print_r($user);

?>