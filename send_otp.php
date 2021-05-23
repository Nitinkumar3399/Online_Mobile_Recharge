<?php
include('smtp/PHPMailerAutoload.php');
session_start();

$con = mysqli_connect('localhost', 'u118805821_RootMR', 'Geek@86533399', 'u118805821_OnlineMR');
$email = $_POST['email'];
$res = mysqli_query($con, "select * from otp_login where email='$email'");
$count = mysqli_num_rows($res);
if ($count > 0) {
    $otp = rand(111111, 999999);  // 6 - digit OTP validation.
    mysqli_query($con, "update otp_login set otp='$otp' where email='$email'");
    $html = "Your OTP verification code is " . $otp." <br/><strong>please do not share this OTP with anyone else.</strong>";
    $_SESSION['EMAIL'] = $email;
    smtp_mailer($email, 'OTP Verification', $html);
    echo "yes";
} else {
    echo "not_exist";
}

function smtp_mailer($to, $subject, $msg)
{
    
    $mail = new PHPMailer();
    //$mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "your-email@example.com";
    $mail->Password = "********";
    $mail->SetFrom("your-email@example.com");
    
    
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    
    $mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}


?>
