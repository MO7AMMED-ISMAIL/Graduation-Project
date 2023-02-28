<?php
    include "../header.php";
    include "../../database/DBClass.php";
    use DbClass\Table;
    $user = new Table('users');
    $output = ['flag'=>0 , 'message'=>""];

    try{
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['email']) && isset($_FILES['img'])){
                $email = $user->ValidateEmail($_POST['email']);
                $SelUser = $user->FindById('user_email',$email);
                if($_FILES['img']['size'] < 200000){
                    $dir = "../../uploads/";
                    $uploadImg = $user->Upload($_FILES['img'],$email,$dir);
                    $output['flag'] = 1;
                    $output['message'] = "image in upload";
                }
            }
        }
    }catch(Exception $e){
        $output['message']= $e->getMessage();
    }
    echo json_encode($output);
?>