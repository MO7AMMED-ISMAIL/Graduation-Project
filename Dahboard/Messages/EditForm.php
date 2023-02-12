<?php
    use DbClass\Table;
    if(isset($_GET['edit'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expire'] = time() + 3600 ;
        $users = new Table('users');
        $userEmail = $users->FindAll();
    }else{
        exit();
    }
?>


<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Update Post</h2>
            </div>
            <form action="Messages/update.php" method="post" class="user">
            <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="token" value="<?=$_SESSION['token']?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?=$MesID?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" id="area" placeholder="Enter Content Post" style="border-radius: 15px;"><?=$SelMes['mes_content']?></textarea>
                </div>
                <div class="form-group">
                <select class="form-control" style="height: 50px;border-radius: 15px;" name="email">
                    <option selected value="<?=$SelMes['mes_to']?>">
                        <?=$SelMes['mes_to']?>
                    </option>
                    <?php
                        foreach($userEmail as $email){
                    ?>
                    <option value="<?=$email['user_email']?>">
                        <?=$email['user_email']?>
                    </option>
                    <?php }?>
                </select>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Update</button>
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
