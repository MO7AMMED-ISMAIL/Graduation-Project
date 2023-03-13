<?php
namespace DbClass;
require "connect.php";
use base\Database;
use Exception;


class Table extends Database{

    public $TbName;
    public function conn(){
        $conn = parent::connect();
    }

    public function __construct($tableName){
        $this->TbName = $tableName;
    }

    public function FindAll($cond=1){
        $sql = "SELECT * FROM {$this->TbName} WHERE ".$cond;
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll();
        return $result;
    }

    public function FindById($cond,$value){
        $sql = "SELECT * FROM {$this->TbName} WHERE $cond = :val";
        $Sel = parent::connect()->prepare($sql);
        $Sel->execute(['val' => $value]);
        if($Sel->rowCount() > 0){
            $result = $Sel->fetch();
            return $result;
        }else{
            throw new Exception("is not Found");
        }
    }

    public function Delete($cond , $value) {
        try{
            $stmt = parent::connect()->prepare("DELETE FROM {$this->TbName} WHERE {$cond} = {$value}");
            $stmt->execute();
        }catch(Exception $e){
            throw new Exception("cant found this table");
        }
    }

    public function Update(array $data , $cond , $value){
        $cols = array();
        foreach($data as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE {$this->TbName} SET ". implode(', ', $cols) ." WHERE $cond  = :id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute(['id' => $value]);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public function Create(array $values){
        $keys = array_keys($values);
        $keys = implode(',', $keys);
        $value = array_values($values);
        $value = "'".implode("','" , $value)."'";
        $sql = "INSERT INTO {$this->TbName} ({$keys}) VALUES ({$value})";
        $stmt = parent::connect()->prepare($sql);
        $stmt = $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public function inputData($data) { 
        if(strlen($data) <= 0){
            throw new Exception("The input {$data} is empty");
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
            return new Exception("is not valid Mail");
        }
    }

    public function InnerJoin($tableName ,array $rows , array $cond){
        $row = implode(', ',$rows);
        $keys = array_keys($cond);
        $key = implode(',', $keys);
        $value = array_values($cond);
        $value = implode(',', $value);
        $sql = "SELECT $row FROM $this->TbName INNER JOIN $tableName ON  $key = $value";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    
    function Upload($image,$email , $dir="../uploads/"){
        $targetDir = $dir;
        $fileName = basename($image["name"]);
        $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            $newImage = uniqid().".".$fileType;
            $targetFilePath = $targetDir . $newImage;
            if(move_uploaded_file($image["tmp_name"], $targetFilePath)){
                $arr = [
                    "image_path"=>$newImage,
                    "email_user"=>$email
                ];
                $this->TbName = 'images';
                self::Create($arr);
            }else{
                throw new Exception("image is not upload");
            }
        }else{
            throw new Exception("Please choose image ");
        }
    }

    public function Login($email , $pass , $role='0'){
        if(is_array($role)){
            $keys = array_keys($role);
            $key = implode(',', $keys);
            $values = array_values($role);
            $value = implode(',', $values);
            $sql = "SELECT * FROM {$this->TbName} WHERE user_email = :em AND user_password = :pass AND $key = '$value'";
        }else{
            $sql = "SELECT * FROM {$this->TbName} WHERE user_email = :em AND user_password = :pass";
        }
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute(['em' => $email , 'pass'=>$pass]);
        if($stmt->rowCount() > 0 ){
            $result = $stmt->fetch();
            return $result;
        }else{
            throw new Exception("email or passwor is not valid");
        }
    }
}

?>