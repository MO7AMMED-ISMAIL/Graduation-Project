<?php
include "../../database/DBClass.php";
include "../header.php";
use DbClass\Table;
$post = new Table('posts');
$output = ["flag"=>'0' , 'message'=>''];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_GET['post_id'])){
        try{
            $title = $post->inputData($_POST['title']);
            $content = $post->inputData($_POST['content']);
            $row = [
                'post_title'=>$title,
                'post_content'=>$content
            ];
            $cond = 'post_id';
            $value = $_GET['post_id'];
            $updatePost = $post->Update($row , $cond , $value);
            $output['flag']= 1;
            $output['message']= "Post is Updated";
        }catch(Exception $e){
            $output['message']= $e->getMessage();
        }
    }
}
echo json_encode($output);
?>
