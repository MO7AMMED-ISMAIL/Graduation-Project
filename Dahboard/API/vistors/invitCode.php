<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $user = new Table('users');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['invitCode'])){
            try{
                $cond = 'user_pass_ard';
                $value = $_GET['invitCode'];
                $user = $user->FindById($cond , $value);
                if($user['user_role'] == 2){
                    $output['flag']= 1;
                    $output['message']= "visitor is registerd";
                }
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);
?>