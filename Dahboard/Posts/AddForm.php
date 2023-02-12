<?php
    if(isset($_GET['add']) == 'Post'){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
    }else{
        header("location: ../Admin.php");
        exit();
    }
    
?>

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Create New Post</h2>
            </div>
            <form action="Posts/add.php" method="post" class="user">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Title Post..." name="title" id="title">
                </div>
                <div class="form-group">
                <textarea class="form-control" name="content" rows="3" id="area" placeholder="Enter Content Post" style="border-radius: 15px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">ADD</button>
            </form>
            <hr>
            <?php
                if(isset($_SESSION['err'])){
                    echo "<div class='alert alert-danger' role='alert' id='error'>".$_SESSION['err']."</div>";
                    unset($_SESSION['err']);
                }
            ?>
        </div>
    </div>
</div>


