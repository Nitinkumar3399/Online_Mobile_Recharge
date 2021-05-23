<!--
    A Design by Nitin Kumar.
    Author: Nitin Kumar
-->

<?php
include 'connection.php';
include('smtp/PHPMailerAutoload.php');

$msg = "";
if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $check = mysqli_num_rows(mysqli_query($con, "select * from all_users where email='$email' and mobile_number = '$mobile_number'"));

    if ($check > 0) {
        $msg = "Email id  has already been taken";
    } else {

        if ($password == $confirm_password) {

            $verification_id = rand(111111111, 999999999);

            mysqli_query($con, "insert into all_users(first_name,last_name,email,mobile_number,password,verification_id,verification_status) values('$first_name','$last_name','$email','$mobile_number','$password','$verification_id',0)");

            mysqli_query($con, "insert into otp_login(email,otp) values('$email','')");

            $msg = "We've just sent a verification link to <strong>$email</strong>. Please check your inbox and click on the link to get started. If you can't find this email (which could be due to spam filters), just request a new one here OR check your spam inbox of email";

            $mailHtml = "Please confirm your account registration by clicking the button or link below: <a href='https://tech-nitin-online.com/OnlineMobileRecharge/public_html/check.php?id=$verification_id'><h4><strong>Click here !! -- <u>For account verification</u> </strong></h4></a>";

            smtp_mailer($email, 'Account Verification', $mailHtml);
        } else {

            $msg= "password not matching -- please try again!";
        }

    }
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
    $mail->Password = "**********";
    $mail->SetFrom("your-email@example.com");
    
    
    $mail->addAttachment("Welcome.pdf");
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



<!DOCTYPE html>
<!-- html -->
<html>
<!-- head -->

<head>
    <title>Online Mobile Recharge</title>
    <link rel="shortcut icon" href="https://img.icons8.com/cute-clipart/64/000000/cellular-network.png"
        type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap-CSS -->
    <link rel="stylesheet" href="css/bootstrap-select.css"><!-- bootstrap-select-CSS -->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /><!-- Fontawesome-CSS -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/MyStyle.css">
    <!--//theme-style-->
    <!--meta data-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Recharge Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//meta data-->
    <!-- online fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- /online fonts -->

</head>
<!-- //head -->
<!-- body -->

<body>
    <!--header-->
    <header>
        <div class="container">
            <!--logo-->
            <div class="logo">
                <h1><a href="index.php"><i class="fa fa-bolt" aria-hidden="true"></i> MobiKwik-Recharge</a></h1>
            </div>
            <!--//logo-->
            <div class="w3layouts-login">
                <a data-toggle="modal" data-target="#myModal" href="#"><i class="glyphicon glyphicon-user">
                    </i> Login/Register</a>
            </div>
            <div class="clearfix"></div>

            <!--Login modal-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;</button>
                            <h4 class="modal-title" id="myModalLabel">
                                Online Mobile Recharge</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 extra-w3layouts"
                                    style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                                        <li><a href="#Registration" data-toggle="tab">Register</a></li>
                                        <li><a href="OTP_Login.php" >Login With OTP</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="Login">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <label for="EMAIL" class="col-sm-2 control-label">
                                                        Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name = "EMAIL" class="form-control" id="EMAIL"
                                                            placeholder="Your Email" required="required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="PASSWORD" name ="PASSWORD"  class="col-sm-2 control-label">
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            id="PASSWORD" placeholder="password"
                                                            required="required" />
                                                    </div>
                                                </div>
                                                <div class="form-group form-check" id="check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" class="col-sm-2 control-label"
                                                        for="exampleCheck1">Stay Logged In</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="submit btn btn-primary btn-sm" onclick="login_now()">
                                                            Login Now</button>
                                                        <!-- Button trigger modal -->
                                                        <a data-toggle="modal" data-target="#exampleModalCenter"
                                                            class="agileits-forgot">Forgot your
                                                            password ?</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">OTP
                                                            Verification</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Enter Your Registered
                                                                    Email</label>
                                                                <input type="text" class="form-control"
                                                                    id="email"  
                                                                    placeholder="Enter email">
                                                                    <span id="email_error" class="field_error">please never share your email</span>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Send
                                                                OTP</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-warning">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="Registration">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <label for="first_name" class="col-sm-2 control-label">
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                                <select class="form-control">
                                                                    <option>Mr.</option>
                                                                    <option>Ms.</option>
                                                                    <option>Mrs.</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                                <input type="text" class="form-control"
                                                                    placeholder="First Name" name="first_name"
                                                                    id="first_name" required="required" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name" class="col-sm-2 control-label">
                                                        Last Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Last name"
                                                            name="last_name" id="last_name" required="required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">
                                                        Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Your Email" name="email" required="required" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobile_number" class="col-sm-2 control-label">
                                                        Mobile</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" maxlength="10" class="form-control"
                                                            id="mobile_number"
                                                            placeholder="Enter valid 10 - digit Mobile Number"
                                                            name="mobile_number" required="required" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password" class="col-sm-2 control-label">
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="password"
                                                            onkeyup='check();' maxlength="8"
                                                            placeholder="Password of 8 special Characters"
                                                            name="password" required="required" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password" class="col-sm-2 control-label">
                                                        Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            id="confirm_password" onkeyup='check();' maxlength="8"
                                                            placeholder="Re-enter above Password"
                                                            name="confirm_password" required="required" />
                                                        <span id="message"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group form-check" id="check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" class="col-sm-2 control-label"
                                                        for="exampleCheck1">Stay Logged In</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="submit"
                                                            class="submit btn btn-primary btn-sm">
                                                            Create My Account</button>
                                                        <button type="reset" class="submit btn btn-danger btn-sm">
                                                            Cancel</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="OR">
                                        OR</div>
                                </div>
                                <div class="col-md-4 extra-agileits">
                                    <div class="row text-center sign-with">
                                        <div class="col-md-12">
                                            <h3 class="other-nw">
                                                Login with</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-group btn-group-justified">
                                                <a href="#" class="btn btn-primary"><i style="font-size: 21px;"
                                                        class="fa fa-facebook-square" aria-hidden="true"></i>
                                                    Facebook</a> <a href="#" class="btn btn-danger"><i
                                                        style="font-size: 21px;" class="fa fa-google"
                                                        aria-hidden="true"></i> Google </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//Login modal-->
        </div>
    </header>

    <!--//-->
    <div class="header-right">
        <div class="banner">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>
                            <div class="banner1">
                                <div class="caption">
                                    <h3><span>Get a</span> coupon voucher on Mobile Recharge</h3>
                                    <p><a href="#mobilew3layouts" class="scroll">Recharge now</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner2">
                                <div class="caption">
                                    <h3><span>50% off</span> on First Recharge</h3>
                                    <p><a href="#mobilew3layouts" class="scroll">Book Now</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner3">
                                <div class="caption">
                                    <h3><span>Flat Rs.200 Cash back</span> Recharge Using Paytm</h3>
                                    <p><a href="#mobilew3layouts" class="scroll">Recharge now</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner4">
                                <div class="caption">
                                    <h3><span>Upto Rs.125 Discount </span> & Flat 100% Money Back</h3>
                                    <p><a href="#mobilew3layouts" class="scroll">Book Now</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

     <div class="message">
         <?php
echo '<h3  style="color:red;margin:auto;max-width:500px;background-color: yellow;margin-top: 15px;background-size:500px 100px; padding:8px;">' . $msg . '</h3>';
?>
     </div>

    <!--Vertical Tab-->
    <div class="categories-section main-grid-border" id="mobilew3layouts">
        <div class="container">
            <div class="category-list">
                <div id="parentVerticalTab">
                    <div class="agileits-tab_nav">
                        <ul class="resp-tabs-list hor_1">
                            <li style="font-size: 18px; color: black;"><i class="icon fa fa-mobile"
                                    aria-hidden="true"></i>Enter Details for Recharge</li>
                        </ul>
                    </div>
                    <div class="resp-tabs-container hor_1">
                        <!-- tab1 -->
                        <div>
                            <div class="tabs-box">

                                <img src="images/mobile.png" class="w3ls-mobile" alt="" data-pin-nopin="true">
                                <ul class="tabs-menu">
                                    <li><a href="#tab1"><label class="radio"><input type="radio" name="radio"
                                                    checked=""><i></i>Prepaid</label></a></li>
                                    <li><a href="#tab2"><label class="radio"><input type="radio"
                                                    name="radio"><i></i>Postpaid</label></a></li>
                                </ul>
                                <div class="clearfix"> </div>
                                <div class="tab-grids">
                                    <div id="tab1" class="tab-grid">
                                        <div class="login-form">
                                            <form action="PaytmKit/kart.php" method="post" id="signup">
                                                <ol>
                                                    <li>
                                                        <h4>Enter your mobile number</h4>
                                                        <input type="tel" id="tel" name="tel" pattern="\d{10}"
                                                            placeholder="Enter Mobile Number" required="required" />
                                                        <p class="validation01">
                                                            <span class="invalid">Please enter a valid mobile
                                                                number</span>
                                                            <span class="valid">That's what we wanted!</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class="agileits-select">
                                                            <select class="selectpicker show-tick"
                                                                data-live-search="true" required="required">
                                                                <option data-tokens="Select Operator">Select Operator
                                                                </option>
                                                                <option data-tokens="Airtel">Airtel</option>
                                                                <option data-tokens="Aircel">Aircel</option>
                                                                <option data-tokens="BSNL">BSNL</option>
                                                                <option data-tokens="Tata Docomo">Tata Docomo</option>
                                                                <option data-tokens="Reliance GSM">Reliance GSM</option>
                                                                <option data-tokens="Reliance CDMA">Reliance CDMA
                                                                </option>
                                                                <option data-tokens="Telenor">Telenor</option>
                                                                <option data-tokens="Jio">Jio</option>
                                                                <option data-tokens="Vodafone">Vodafone</option>
                                                                <option data-tokens="Idea">Idea</option>
                                                                <option data-tokens="MTS">MTS</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="agileits-select">
                                                            <select class="selectpicker show-tick"
                                                                data-live-search="true" required="required">
                                                                <option data-tokens="Select Circle">Select Circle
                                                                </option>
                                                                <option data-tokens="Chennai">Chennai</option>
                                                                <option data-tokens="Delhi NCR">Delhi NCR</option>
                                                                <option data-tokens="Kolkata">Kolkata</option>
                                                                <option data-tokens="Mumbai">Mumbai</option>
                                                                <option data-tokens="Maharashtra & Goa">Maharashtra &
                                                                    Goa</option>
                                                                <option data-tokens="Assam">Assam</option>
                                                                <option data-tokens="Bihar & Jharkhand">Bihar &
                                                                    Jharkhand</option>
                                                                <option data-tokens="Gujarat">Gujarat</option>
                                                                <option data-tokens="Haryana">Haryana</option>
                                                                <option data-tokens="Himachal Pradesh">Himachal Pradesh
                                                                </option>
                                                                <option data-tokens="Jummu & Kashmir">Jummu & Kashmir
                                                                </option>
                                                                <option data-tokens="Karnataka">Karnataka</option>
                                                                <option data-tokens="Kerala">Kerala</option>
                                                                <option data-tokens="Andhra Pradesh">Andhra Pradesh
                                                                </option>
                                                                <option data-tokens="MP & Chattisgarh">MP & Chattisgarh
                                                                </option>
                                                                <option data-tokens="North East">North East</option>
                                                                <option data-tokens="Orissa">Orissa</option>
                                                                <option data-tokens="Punjab">Punjab</option>
                                                                <option data-tokens="Rajasthan">Rajasthan</option>
                                                                <option data-tokens="Tamilnadu">Tamilnadu</option>
                                                                <option data-tokens="UP East">UP East</option>
                                                                <option data-tokens="UP West & Utterkhand">UP West &
                                                                    Utterkhand</option>
                                                                <option data-tokens="West Bengal">West Bengal</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="mobile-right ">
                                                            <h4>How Much To Recharge?</h4>
                                                            <div class="mobile-rchge">
                                                                <input type="text" placeholder="Enter amount"
                                                                    name="amount" required="required" />
                                                            </div>
                                                            <div class="mobile-rchge">
                                                                <a data-toggle="modal" data-target="#myModal" href="#">VIEW ALL PLANS</a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <input data-toggle="modal" data-target="#myModal" type="submit" class="submit" value="Recharge Now" />
                                                    </li>
                                                </ol>
                                            </form>

                                        </div>

                                    </div>
                                    <div id="tab2" class="tab-grid">
                                        <div class="login-form">
                                            <form action="PaytmKit/kart.php" method="post" id="signup">
                                                <ol>
                                                    <li>
                                                        <h4>Enter your mobile number</h4>
                                                        <input type="tel" id="tel" name="tel" pattern="\d{10}"
                                                            placeholder="Enter Mobile Number" required />
                                                        <p class="validation01">
                                                            <span class="invalid">Please enter a valid mobile
                                                                number</span>
                                                            <span class="valid">That's what we wanted!</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class="agileits-select">
                                                            <select class="selectpicker show-tick"
                                                                data-live-search="true">
                                                                <option data-tokens="Select Operator">Select Operator
                                                                </option>
                                                                <option data-tokens="Airtel">Airtel</option>
                                                                <option data-tokens="Aircel">Aircel</option>
                                                                <option data-tokens="BSNL">BSNL</option>
                                                                <option data-tokens="Tata Docomo">Tata Docomo</option>
                                                                <option data-tokens="Reliance GSM">Reliance GSM</option>
                                                                <option data-tokens="Reliance CDMA">Reliance CDMA
                                                                </option>
                                                                <option data-tokens="Telenor">Telenor</option>
                                                                <option data-tokens="Jio">Jio</option>
                                                                <option data-tokens="Vodafone">Vodafone</option>
                                                                <option data-tokens="Idea">Idea</option>
                                                                <option data-tokens="MTS">MTS</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="agileits-select">
                                                            <select class="selectpicker show-tick"
                                                                data-live-search="true" required="required">
                                                                <option data-tokens="Select Circle">Select Circle
                                                                </option>
                                                                <option data-tokens="Chennai">Chennai</option>
                                                                <option data-tokens="Delhi NCR">Delhi NCR</option>
                                                                <option data-tokens="Kolkata">Kolkata</option>
                                                                <option data-tokens="Mumbai">Mumbai</option>
                                                                <option data-tokens="Maharashtra & Goa">Maharashtra &
                                                                    Goa</option>
                                                                <option data-tokens="Assam">Assam</option>
                                                                <option data-tokens="Bihar & Jharkhand">Bihar &
                                                                    Jharkhand</option>
                                                                <option data-tokens="Gujarat">Gujarat</option>
                                                                <option data-tokens="Haryana">Haryana</option>
                                                                <option data-tokens="Himachal Pradesh">Himachal Pradesh
                                                                </option>
                                                                <option data-tokens="Jummu & Kashmir">Jummu & Kashmir
                                                                </option>
                                                                <option data-tokens="Karnataka">Karnataka</option>
                                                                <option data-tokens="Kerala">Kerala</option>
                                                                <option data-tokens="Andhra Pradesh">Andhra Pradesh
                                                                </option>
                                                                <option data-tokens="MP & Chattisgarh">MP & Chattisgarh
                                                                </option>
                                                                <option data-tokens="North East">North East</option>
                                                                <option data-tokens="Orissa">Orissa</option>
                                                                <option data-tokens="Punjab">Punjab</option>
                                                                <option data-tokens="Rajasthan">Rajasthan</option>
                                                                <option data-tokens="Tamilnadu">Tamilnadu</option>
                                                                <option data-tokens="UP East">UP East</option>
                                                                <option data-tokens="UP West & Utterkhand">UP West &
                                                                    Utterkhand</option>
                                                                <option data-tokens="West Bengal">West Bengal</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="mobile-right ">
                                                            <h4>How Much To Pay?</h4>
                                                            <div class="mobile-rchge">
                                                                <input type="text" placeholder="Enter amount"
                                                                    name="amount" required="required" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <input data-toggle="modal" data-target="#myModal"  type="submit" class="submit" value="Pay bill" />
                                                    </li>
                                                </ol>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"> </div>
                            </div>
                            <!-- script -->
                            <script>
                                $(document).ready(function () {
                                    $("#tab2").hide();
                                    $("#tab3").hide();
                                    $("#tab4").hide();
                                    $(".tabs-menu a").click(function (event) {
                                        event.preventDefault();
                                        var tab = $(this).attr("href");
                                        $(".tab-grid").not(tab).css("display", "none");
                                        $(tab).fadeIn("slow");
                                    });
                                });
                            </script>


                        </div>
                        <!-- /tab1 -->

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--Plug-in Initialisation-->
    <script type="text/javascript">
        $(document).ready(function () {

            //Vertical Tab
            $('#parentVerticalTab').easyResponsiveTabs({
                type: 'vertical', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo2');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <!-- //Categories -->


    <!--phone-->
    <div class="phone" id="mobileappagileits">
        <div class="container">
            <div class="col-md-6">
                <img src="images/ph1.png" class="img-responsive" alt="" />
            </div>
            <div class="col-md-6 phone-text">
                <h4>Online Payment mobile app on your smartphone!</h4>
                <p class="subtitle">Simple and Easy Fast Payments</p>
                <div class="text-1">
                    <h5>Recharge</h5>
                    <p>Recharge your Mobile On App</p>
                </div>

                <div class="agileinfo-dwld-app">
                    <h6>Download The App :
                        <a href="#"><i class="fa fa-apple"></i></a>
                        <a href="#"><i class="fa fa-windows"></i></a>
                        <a href="#"><i class="fa fa-android"></i></a>
                    </h6>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="wthree-mobile-app">
                <form action="#" method="get">
                    <input class="text" type="tel" name="tel" placeholder="Enter Your Mobile Number" required="">
                    <input type="submit" value="Send Download Link">
                </form>
            </div>
        </div>
    </div>
    <!--//phone-->


    <!-- Support content -->
    <div class="w3l-support">
        <div class="container">
            <div class="col-md-5 w3_agile_support_left">
                <img src="images/cus.jpg" alt=" " class="img-responsive" />
            </div>
            <div class="col-md-7 w3_agile_support_right">
                <h5>Online Recharge</h5>
                <h3>24/7 Customer Service Support</h3>
                <p>We have Power that Brings Smile on your Fact. We Believe in service , and you Know that we Feeling
                    the Joy of serving you Best. </p>
                <div class="flex-container">
                    <div class="agile_more">
                        <a href="support.html" class="type-4">
                            <span> Support </span>
                            <span> Support </span>
                            <span> Support </span>
                            <span> Support </span>
                            <span> Support </span>
                            <span> Support </span>
                        </a>
                    </div>
                    <div class="agile_more">
                        <a href="feedback.html" class="type-4">
                            <span> Feedback </span>
                            <span> Feedback </span>
                            <span> Feedback </span>
                            <span> Feedback </span>
                            <span> Feedback </span>
                            <span> Feedback </span>
                        </a>
                    </div>
                    <div class="agile_more">
                        <a href="contact.html" class="type-4">
                            <span> Contact Us </span>
                            <span> Contact Us </span>
                            <span> Contact Us </span>
                            <span> Contact Us </span>
                            <span> Contact Us </span>
                            <span> Contact Us </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //Support content -->


    <!--offers-->
    <div class="w3-offers">
        <div class="container">
            <div class="w3-agile-offers">
                <h3>the best offers</h3>
                <p>Discounts Galore For The Things You Adore.A discount that will make you flinch.Low prices. Big
                    discounts. Get more for less. Nothing’s off the table, everything is discountable.</p>
            </div>
        </div>
    </div>
    <!--//offers-->

    <!--partners-->
    <div class="w3layouts-partners">
        <h3>We are accepted at</h3>
        <div class="container">
            <ul>
                <li><a href="#"><img class="img-responsive" src="images/lg.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg1.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg2.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg3.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg4.png" alt=""></a></li>
            </ul>
            <ul>
                <li><a href="#"><img class="img-responsive" src="images/lg5.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg6.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg7.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg8.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="images/lg9.png" alt=""></a></li>
            </ul>
        </div>
    </div>
    <div class="flex-container mycenter">
        <div class="agile_more">
            <a href="about.html" class="type-4">
                <span> About Us </span>
                <span> About Us </span>
                <span> About Us </span>
                <span> About Us </span>
                <span> About Us </span>
                <span> About Us </span>
            </a>
        </div>
        <div class="agile_more">
            <a href="faq.html" class="type-4">
                <span> FAQ </span>
                <span> FAQ </span>
                <span> FAQ </span>
                <span> FAQ </span>
                <span> FAQ </span>
                <span> FAQ </span>
            </a>
        </div>
        <div class="agile_more">
            <a href="terms.html" class="type-4">
                <span> Terms & Conditions </span>
                <span> Terms & Conditions </span>
                <span> Terms & Conditions </span>
                <span> Terms & Conditions </span>
                <span> Terms & Conditions </span>
                <span> Terms & Conditions </span>
            </a>
        </div>
    </div>
    <!--//partners-->

    <!-- subscribe -->
    <div class="w3-subscribe agileits-w3layouts">
        <div class="container">
            <div class="col-md-6 social-icons w3-agile-icons">
                <h4>Join Us</h4>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/" class="fa fa-facebook sicon facebook"> </a>
                    </li>
                    <li><a target="_blank" href="https://twitter.com/login" class="fa fa-twitter sicon twitter"> </a>
                    </li>
                    <li><a href="#" class="fa fa-google-plus sicon googleplus"> </a></li>
                    <li><a target="_blank" href="https://github.com/" class="fa fa-github sicon fa-github-alt"
                            style="background-color: black;"> </a></li>
                    <li><a target="_blank"
                            href="https://www.linkedin.com/login?trk=homepage-basic_conversion-modal-signin"
                            class="fa fa-linkedin sicon linkedin" style="background-color: #0077B5;"> </a></li>
                    <li><a target="_blank" href="https://www.instagram.com/" class="fa fa-instagram sicon instagram"
                            style="background-color: #E2644B;"> </a>
                    </li>
                    <li><a target="_blank" href="https://www.microsoft.com/en-in" class="fa fa-windows sicon window"
                            style="background-color: #00A4EF;"> </a></li>
                    <li><a target="_blank"
                            href="https://www.reddit.com/r/help/comments/9fzfwv/login_only_through_old_reddit/"
                            class="fa fa-reddit sicon fa-reddit-alien" style="background-color: #FF4500;"> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 w3-agile-subscribe-right">
                <h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="Enter your Email..." required="">
                    <input type="submit" value="Subscribe">
                    <div class="clearfix"> </div>
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //subscribe -->

    <!--footer-->

    <footer>
        <div class="container-fluid">
            <div class="w3-agile-footer-top-at">
                <div class="col-md-2 agileits-amet-sed">
                    <h4>Company</h4>
                    <ul class="w3ls-nav-bottom">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="support.html">Support</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="#mobileappagileits" class="scroll">Mobile</a></li>
                        <li><a href="feedback.html">Feedback</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Shortcodes</a></li>
                        <li><a href="#">Icons Page</a></li>

                    </ul>
                </div>
                <div class="col-md-3 agileits-amet-sed ">
                    <h4>Mobile Recharges</h4>
                    <ul class="w3ls-nav-bottom">
                        <li><a href="#" class="scroll">Airtel</a></li>
                        <li><a href="#" class="scroll">Aircel</a></li>
                        <li><a href="#" class="scroll">Vodafone</a></li>
                        <li><a href="#" class="scroll">BSNL</a></li>
                        <li><a href="#" class="scroll">Tata Docomo</a></li>
                        <li><a href="#" class="scroll">Reliance GSM</a></li>
                        <li><a href="#" class="scroll">Reliance CDMA</a></li>
                        <li><a href="#" class="scroll">Telenor</a></li>
                        <li><a href="#" class="scroll">MTS</a></li>
                        <li><a href="#" class="scroll">Jio</a></li>
                    </ul>
                </div>
                <div class="col-md-3 agileits-amet-sed ">
                    <h4>DATACARD RECHARGES</h4>
                    <ul class="w3ls-nav-bottom">
                        <li><a href="#" class="scroll">Tata Photon</a></li>
                        <li><a href="#" class="scroll">MTS MBlaze</a></li>
                        <li><a href="#" class="scroll">MTS MBrowse</a></li>
                        <li><a href="#" class="scroll">Airtel</a></li>
                        <li><a href="#" class="scroll">Aircel</a></li>
                        <li><a href="#" class="scroll">BSNL</a></li>
                        <li><a href="#" class="scroll">MTNL Delhi</a></li>
                        <li><a href="#" class="scroll">Vodafone</a></li>
                        <li><a href="#" class="scroll">Idea</a></li>
                        <li><a href="#" class="scroll">MTNL Mumbai</a></li>
                        <li><a href="#" class="scroll">Tata Photon Whiz</a></li>
                    </ul>
                </div>
                <div class="col-md-2 agileits-amet-sed">
                    <h4>DTH Recharges</h4>
                    <ul class="w3ls-nav-bottom">
                        <li><a href="#" class="scroll"> Airtel Digital TV Recharges</a></li>
                        <li><a href="#" class="scroll">Dish TV Recharges</a></li>
                        <li><a href="#" class="scroll">Tata Sky Recharges</a></li>
                        <li><a href="#" class="scroll">Reliance Digital TV Recharges</a></li>
                        <li><a href="#" class="scroll">Sun Direct Recharges</a></li>
                        <li><a href="#" class="scroll">Videocon D2H Recharges</a></li>
                    </ul>
                </div>
                <div class="col-md-2 agileits-amet-sed ">
                    <h4>Payment Options</h4>
                    <ul class="w3ls-nav-bottom">
                        <li>Credit Cards</li>
                        <li>Debit Cards</li>
                        <li>Any Visa Debit Card (VBV)</li>
                        <li>Direct Bank Debits</li>
                        <li>Cash Cards</li>
                    </ul>
                </div>

                <div class="clearfix"> </div>

            </div>

        </div>
        <div class="w3l-footer-bottom">
            <div class="container-fluid">
                <div class="col-md-4 w3-footer-logo">
                    <h2><a href="index.php">ONLINE RECHARGE</a></h2>
                </div>
                <div class="col-md-8 agileits-footer-class">
                    <p>© 2020 Online Recharge. All Rights Reserved | Design by <a href="index.php">Nitin Kumar</a> </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </footer>
    <!--//footer-->

    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- Responsive-slider -->
    <!-- Banner-slider -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>

    <!-- //Banner-slider -->
    <!-- //Responsive-slider -->
    <!-- Bootstrap select option script -->
    <script src="js/bootstrap-select.js"></script>
    <script>
        $(document).ready(function () {
            var mySelect = $('#first-disabled2');

            $('#special').on('click', function () {
                mySelect.find('option:selected').prop('disabled', true);
                mySelect.selectpicker('refresh');
            });

            $('#special2').on('click', function () {
                mySelect.find('option:disabled').prop('disabled', false);
                mySelect.selectpicker('refresh');
            });

            $('#basic2').selectpicker({
                liveSearch: true,
                maxOptions: 1
            });
        });
    </script>
    <!-- //Bootstrap select option script -->

    <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
    <script src="js/easyResponsiveTabs.js"></script>
    <!-- //easy-responsive-tabs -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
                };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <!-- //here ends scrolling icon -->

    <!--password  matching using javascript -->
    <script>
        var check = function () {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').style.fontFamily = 'Arial';
                document.getElementById('message').innerHTML = "Matching - That's what we want";
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').style.fontFamily = 'Arial';
                document.getElementById('message').innerHTML = 'Password should Match';
            }
        }
    </script>
    <!--/password  matching using javascript -->

    <!-- Login now using Ajax implementation -->
    <script>
function login_now(){
	var email=jQuery('#EMAIL').val();
	var password=jQuery('#PASSWORD').val();
	
	jQuery.ajax({
		url:'login_check.php',
		type:'post',
		data:'email='+email+'&password='+password,
		success:function(result){
			if(result=='done'){
				window.location.href='guestUser.php';
			}
			jQuery('.message').html(result);
		}
	});
}
</script>
<!-- //Login now using Ajax implementation -->
</body>
<!-- //body -->

</html>
<!-- //html -->
