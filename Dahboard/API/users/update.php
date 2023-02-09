<?php
include "../../database/DBClass.php";
include "../header.php";
use DbClass\Table;
$user = new Table('users');
$output = ["flag"=>'0' , 'message'=>''];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['f_name']) && isset($_POST['email']) && isset($_POST['l_name']) && isset($_POST['phone'])){
        try{
            $f_name = $user->inputData($_POST['f_name']);
            $l_name = $user->inputData($_POST['l_name']);
            $username = $f_name ." ".$l_name;
            $phone = $user->inputData($_POST['phone']);
            $email =  $user->ValidateEmail($_POST['email']);
            $row = [
                'user_name'=>$username,
                'user_email'=>$email,
                'user_phone'=>$phone,
            ];
            $cond = 'user_id';
            $value = $_GET['id'];
            $user = $user->Update($row , $cond,$value);
            $output['flag']= 1;
            $output['message']= "Data is Updated";
        }catch(Exception $e){
            $output['message']= $e->getMessage();
        }
    }
}
echo json_encode($output);
?>