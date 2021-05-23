<?php
session_start();
$con = mysqli_connect('localhost', 'u118805821_RootMR', 'Geek@86533399', 'u118805821_OnlineMR');
$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];
$res = mysqli_query($con, "select * from otp_login where email='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if ($count > 0) {
    mysqli_query($con, "update otp_login set otp='' where email='$email'");
    $_SESSION['IS_LOGIN'] = $email;
    echo "YES1";
} else {
    echo "NOT_EXIST1";
}
?>

