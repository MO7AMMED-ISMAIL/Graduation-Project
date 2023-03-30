<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $user = new Table('users');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['password']) && isset($_POST['email'])){
            try{
                $email =  $user->ValidateEmail($_POST['email']);
                $password = $user->inputData($_POST['password']);
                $user = $user->Login($email , $password);
                $output['flag']= 1;
                $output['message']= "Success Login";
                $output['id'] = $user['user_id'];
                $output['role'] = $user['user_role'];
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);
?>