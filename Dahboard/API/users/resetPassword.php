<?php
include "../../database/DBClass.php";
include "../header.php";
use DbClass\Table;
$user = new Table('users');
$output = ["flag"=>'0' , 'message'=>''];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['verNewPassword']) ){
        if(isset($_GET['id'])){
            try{
                $cond = 'user_id';
                $value = $_GET['id'];
                $SelUser = $user->FindById($cond,$value);
                $oldPassword = $SelUser['user_password'];
                $password = $user->inputData($_POST['password']);
                $newPassword = $user->inputData($_POST['newPassword']);
                $verNewPassword = $user->inputData($_POST['verNewPassword']);
                if($oldPassword === $password){
                    if($newPassword === $verNewPassword){
                        $row = [
                            'user_password'=>$newPassword,
                        ];
                        $user = $user->Update($row,$cond,$value);
                        $output['flag']= 1;
                        $output['message']= "Password is Updated";
                    }else{
                        throw new Exception("The new password does not match");
                    }
                }else{
                    throw new Exception("The current password is incorrect");
                }
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
}
echo json_encode($output);
?>