<?php
    include "../../database/DBClass.php";
    include "../header.php";

    use DbClass\Table;
    $user = new Table('users');
    $output = ["flag"=>'0' , 'message'=>''];

    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST) && count($_POST) == 5){
                $username = $user->inputData($_POST['username']);
                $email = $user->ValidateEmail($_POST['email']);
                $phone = $user->inputData($_POST['phone']);
                $password = $user->inputData($_POST['password']);
                $repeatPassword = $user->inputData($_POST['repeatPassword']);
                if($password != $repeatPassword){
                    throw new Exception("Passwords do not match");
                }else{
                    $role = '2';
                    $password_ard = rand(1000000,99999999);
                    //insert user
                    $DataInsert = [
                        'user_name'=>$username,
                        'user_password'=>$password,
                        'user_pass_ard'=>$password_ard,
                        'user_email'=>$email,
                        'user_phone'=>$phone,
                        'user_role'=>$role,
                    ];
                    $user->Create($DataInsert); 
                    $output['flag']= 1;
                    $output['message']= "sucess register";
                    $output['inviteCode'] = $password_ard;
                }
                
            }else{
                $output['message']= "Complete Your data to register";
            }
        }else{
            $output['message']= "Request Must be POST";
        }
    }catch(Exception $e){
        $output['message']= $e->getMessage();
    }
    echo json_encode($output);
?>

