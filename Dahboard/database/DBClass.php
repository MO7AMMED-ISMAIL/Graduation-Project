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

    public function FindById($cond,$value){
        $sql = "SELECT * FROM {$this->TbName} WHERE $cond=:id";
        $Sel = parent::connect()->prepare($sql);
        $Sel->execute(['id' => $value]);
        $result = $Sel->fetch();
        return $result;
    }

    public function Delete($id) {
        $stmt = parent::connect()->prepare("DELETE FROM {$this->TbName} WHERE id={$id}");
        $stmt->execute();
    }

    public function Update(array $data , $id){
        $cols = array();
        foreach($data as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE {$this->TbName} SET ". implode(', ', $cols) ." WHERE id = :id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
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

    public function inputData($data) { 
        if(strlen($data) < 0){
            throw new Error("The input {$data} is empty");
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

    public function InnerJoin($tableName , $atrr1 ,$atrr2, $value=1){
        $sql = "SELECT $this->TbName.id , $this->TbName.username, $this->TbName.password ,$this->TbName.email, $tableName.title FROM {$this->TbName}  INNER JOIN {$tableName} ON {$this->TbName}.$atrr1 = {$tableName}.id WHERE {$tableName}.{$atrr2} = '$value'";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    
    function Upload($image){
        $targetDir = "../uploads/";
        $fileName = basename($image["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif');
        
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($image["tmp_name"], $targetFilePath)){
                $arr = ["image"=>$targetFilePath];
                $this->TbName = 'images';
                self::Create($arr);
            }
        }
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