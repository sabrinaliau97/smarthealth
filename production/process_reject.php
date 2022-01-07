<?php
require_once 'include/common.php';
require_once('phpmailer/PHPMailerAutoload.php');


// grab user input from $_POST: fullname, email, mobnum --> ---------------------------------------
if (isset($_POST['username']) && isset($_POST['name']))
{
    $fullname = $_POST['name'];
    $email = $_POST['username'];
    $txt = nl2br("Dear ". $fullname .",
    \r\n Your request for an account on CHRW has been rejected. Please check with CHRT or submit another request for an account.\r\n\r\nThank you and stay safe.\r\n\r\nBest Regards,\r\nCommunity Hospital Referral Team (CHRT)");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'phicopn@gmail.com';
    $mail->Password = 'mlthunhoigjyqtsi';

    $mail->SetFrom('phicopn@gmail.com');
    $mail->Subject ='CHRW Request Rejected';
    $mail->Body = $txt;
    $mail->AddAddress($email);

    if(!$mail->send()) 
    {
        $msg = 'Message could not be sent.';
    } 
    else 
    {
        $dao = new RejectuserDAO();
        $msg = $dao->delete($email);
    }
}
else
{
    $msg = "Missing information";
}

header("Location: ch_user.php");
return;

?>