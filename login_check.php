<?php
include 'connection.php';
session_start();
if (isset($_POST['email']) && $_POST['password']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res = mysqli_query($con, "select * from all_users where email='$email' and password='$password'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $verification_status = $row['verification_status'];
        if ($verification_status == 0) {
            echo "You have not confirmed your account yet. Please check your inbox and verify your email id.";
        } else {
            echo "done";
            $_SESSION['IS_LOGIN'] = 1;
        }
    } else {
        echo "Please enter corect login details";
    }
}
