<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$posts = new Table('posts');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_POST['token']) || !isset($_SESSION['token'])){
        exit('Token is not set');
    }
    if($_POST['token'] == $_SESSION['token']){
        if(time() >= $_SESSION['token_expire']){
            exit('Token is Expired');
        }
        unset($_SESSION['token']);
    }
    //validation
    try{
        $img = $_FILES['img'];
        if($img['size'] != 0){
            $title = $posts->inputData($_POST['title']);
            $content = $posts->inputData($_POST['content']);
            $insert = addData($img);
            if($insert === true){
                header("location: ../Post.php");
                exit();
            }else{
                $_SESSION['err'] = $insert;
            }
        }else{
            $_SESSION['err'] = "You Must Upload Image";
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: ../Post.php?add=Post");
        exit();
    }
    
}

function addData($img){
    global $title , $content , $posts;
    $dirFile = "Images/";
    $allowTypes = array('jpg','png','jpeg','gif');
    $fileName = basename($img["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $newImage = uniqid().".".$fileType;
    $targetFilePath = $dirFile . $newImage;
    if($img['size'] < 500000){
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($img["tmp_name"],$targetFilePath)){
                $dataInser = [
                    "post_title"=>$title,
                    "post_content"=>$content,
                    "post_img"=>$newImage,
                    "users_id"=>$_SESSION['Admin_id']
                ];
                $posts->Create($dataInser);
                return true;
            }
        }else{
            throw new Exception("You Must Upload Image");
        }
    }else{
        throw new Exception("images is So bigger");
    }
}
?>