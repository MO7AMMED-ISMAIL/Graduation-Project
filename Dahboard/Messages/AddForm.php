<?php
    use DbClass\Table; 
    if(isset($_GET['add']) == 'Mes'){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
        $users = new Table('users');
        $userEmail = $users->FindAll(); 
    }else{
        header("location: ../Admin.php");
        exit();
    }
    
?>

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Create New Message</h2>
            </div>
            <form action="Messages/add.php" method="post" class="user">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" id="area" placeholder="Enter Content Post" style="border-radius: 15px;"></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" style="height: 50px;border-radius: 15px;" name="email">
                        <option selected>Open this select menu</option>
                        <?php 
                            foreach($userEmail as $email){
                        ?>
                            <?php
                                if($email['user_email'] != $_SESSION['Admin_email']){
                            ?>
                                    <option value="<?=$email['user_email']?>"><?=$email['user_email']?></option>
                            <?php }?>
                        <?php }?>
                    </select>
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


