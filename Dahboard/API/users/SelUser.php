<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $user = new Table('users');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id'])){
            try{
                $cond = 'user_id';
                $value = $_GET['id'];
                $user = $user->FindById($cond , $value);
                $output['flag']= 1;
                $output['message']= "User is Selected";
                $output['data'] = $user;
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);

?>