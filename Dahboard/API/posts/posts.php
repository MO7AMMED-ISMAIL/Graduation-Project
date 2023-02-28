<?php
    include "../../database/DBClass.php";
    include "../header.php";
    use DbClass\Table;
    $row = ['post_id','post_title','post_content','user_name','users_id'];
    $cond=['users_id'=>'user_id'];
    $posts = new Table('posts');
    $output = ["flag"=>'0' , 'message'=>''];

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        try{
            $posts = $posts->InnerJoin('users',$row,$cond);
            $output['flag']= 1;
            $output['message']= "Posts is Selected";
            $output['data'] = $posts;
        }catch(Exception $e){
            $output['message']= $e->getMessage();
        }
    }
    echo json_encode($output);
?>