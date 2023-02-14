<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];
    try{
        if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
            if(isset($_GET['post_id'])){
                $post = $posts->FindById('post_id',$_GET['post_id']);
                $userId = $post['users_id'];
                if(isset($_GET['user_id']) && $_GET['user_id']== $userId){
                    try{
                        $delPost = $posts->delete('post_id',$_GET['post_id']);
                        $output['flag']= 1;
                        $output['message']= "Post is Deleted";
                    }catch(Exception $e){
                        $output['message']= $e->getMessage();
                    }
                }else{
                    $output['message']= "cant delete this post";
                }
            }
        }else{
            $output['message']='REQUEST METHOD Must be deletd';
        }
    }catch(Exception $e){
        $output['message']= $e->getMessage();
    }
    echo json_encode($output);
?>