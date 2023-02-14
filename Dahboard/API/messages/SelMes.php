<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $message = new Table('messages');
    $output = ["flag"=>'0' , 'message'=>''];
    try{
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if($_GET['email']){
                $email = $_GET['email'];
                $cond = "mes_to".'='."'$email'";
                $mes = $message->FindAll($cond);
                $output['flag']= 1;
                $output['message'] = "data is Selected";
                $output['data']= $mes;
            }
        }else{
            $output['message']= $e->getMessage();
        }
    }catch(Exception $e){
        $output['message']= "cant updated this Get";
    }
    echo json_encode($output);
?>