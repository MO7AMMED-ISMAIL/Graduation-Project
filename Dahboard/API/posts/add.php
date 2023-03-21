<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['content']) && $_POST['id'] && isset($_POST['title']) && isset($_FILES['img'])){
            try{
                $img = $_FILES['img'];
                $id = $posts->inputData($_POST['id']);
                $title = $posts->inputData($_POST['title']);
                $content = $posts->inputData($_POST['content']);
                $data = [
                    'post_title'=>$title,
                    'post_content'=>$content,
                    'users_id'=>$id
                ];
                $AddPost = addData($img);
                $output['flag']= 1;
                $output['message']= "Post is Created";
            }catch(Exception $e){
                $output['message']= $e->getMessage();
            }
        }
    }
    function addData($img){
        global $title , $content , $posts ,$id ;
        $dirFile = "../../Posts/Images";
        $allowTypes = array('jpg','png','jpeg','gif');
        $fileName = basename($img["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $newImage = uniqid().".".$fileType;
        $targetFilePath = $dirFile . $newImage;
        if($img['size'] < 1000000){
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($img["tmp_name"],$targetFilePath)){
                    $dataInser = [
                        "post_title"=>$title,
                        "post_content"=>$content,
                        "post_img"=>$newImage,
                        "users_id"=>$id
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
    echo json_encode($output);
?>