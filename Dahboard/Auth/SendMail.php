<?php
    session_start();
    include "../database/DBClass.php";
    use DbClass\Table;
    $admin = new Table('users');
    try{
        $email = $admin->ValidateEmail($_POST['email']);
        $SelAdmin = $admin->FindById('user_email',$email);
        $_SESSION['id_admin'] = $SelAdmin['user_id']; 

    }catch(Exception $e){
        $_SESSION['err'] = $e->getMessage();
        header("location:forgetPassword.php");
        exit();
    }
    $gmailUser = $SelAdmin['user_email']; //mail to send rest password
    $nameUser = $SelAdmin['user_name'];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
        $Code = substr(md5(microtime()),rand(0,26),5);
        $_SESSION['code'] = $Code;
    try {
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Show error
        $mail->Host       = 'smtp.example.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'aspsmailer@gmail.com'; // your email 
        $mail->Password   = 'kncuaijsbvgucocs'; // your password
        $mail->Port       = 456;
        //Recipients
        $mail->setFrom('aspsmailer@gmail.com', 'ASPS Team');
        $mail->addAddress($gmailUser); 
        //Content
        $mail->isHTML(true); 

        $mail->Subject = 'Forgetten password message';
        $mail->Body    = 'Hello!'.$nameUser.'<br><h3>Here is your Verification code ^_^</h3><br><h1>'.$Code.'</h1>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        header('location:CodeVerificationForm.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>