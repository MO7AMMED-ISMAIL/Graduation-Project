<?php
include "../database/DBClass.php";
use DbClass\Table;
session_start();
$update = new Table('posts');  

if($_SERVER['REQUEST_METHOD'] == "POST"){
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
            $id = $update->inputData($_POST['id']);
            $title = $update->inputData($_POST['title']);
            $content = $update->inputData($_POST['content']);
            $updatePost = EditData($img);
            if($updatePost === true){
                header("location: ../Post.php");
                exit();
            }else{
                $_SESSION['err'] = $updatePost;
            }
        }else{
            $_SESSION['err'] = "You Must Upload Image";
        }
    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location: ../Post.php?edit=$id");
    }
    
}

function EditData($img){
    global $title , $content , $update ,$id;
    $dirFile = "Images/";
    $allowTypes = array('jpg','png','jpeg','gif');
    $fileName = basename($img["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $newImage = uniqid().".".$fileType;
    $targetFilePath = $dirFile . $newImage;
    if($img['size'] < 500000){
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($img["tmp_name"],$targetFilePath)){
                $DataUpdate = [
                    "post_id"=>$id,
                    "post_title"=>$title,
                    "post_content"=>$content,
                    "post_img"=>$newImage
                ];
                $update->Update($DataUpdate,'post_id',$id);
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
