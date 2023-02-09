<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $user = new Table('users');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(isset($_GET['id'])){
            try{
                $cond = 'user_id';
                $value = $_GET['id'];
                $user = $user->Delete($cond , $value);
                $output['flag']= 1;
                $output['message']= "User is Deleted";
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    echo json_encode($output);

?>