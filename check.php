<?php
include('connection.php');
$id=mysqli_real_escape_string($con,$_GET['id']);
mysqli_query($con,"update all_users set verification_status='1' where verification_id='$id'");
?>


<!DOCTYPE html>
<!-- html -->
<html>
<!-- head -->

<head>
    <title> Verified !!</title>
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

    <!--Vertical Tab-->
    <div style="background-color:lightgreen;" class="categories-section main-grid-border" id="mobilew3layouts">
        <div class="container">
            <div class="category-list">
                <div id="parentVerticalTab">
                    <div class="agileits-tab_nav">
                        <ul class="resp-tabs-list hor_1">
                            <li style="font-size: 18px; color: black; font-weight: bolder"><i class="icon fa fa-mobile"
                                    aria-hidden="true"></i>Successfully Verified</li>
                        </ul>
                    </div>
                    <div class="resp-tabs-container hor_1">
                        <!-- tab1 -->
                        <div>
                            <p style="color: green; font-weight: bolder; font-size: x-large;">Congratulations!!</p> <br>
                            <h3><b> <mark><u style="text-decoration-color:blue;">YOUR ACCOUNT HAS BEEN VERIFIED !
                                        </u></mark> <br> <br> <span style="color: #FF4500;">Thank you for
                                        Registering on MobiKwik-Recharge.</span> </b></h3> <br> <br><b
                                style="font-size: large;">Click below button
                                to login into your Account</b><br> <br> <button type="button"
                                style="color: black; font-size: large; font-weight: bolder; box-shadow: 2.2px 2.2px #888888; width: 158px;"
                                onclick="clickMeToLogin()" class="btn btn-outline-success">Login</button>

                            <script>

                                function clickMeToLogin() {
                                    window.location = "login.php";
                                }
                            </script>


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
        function login_now() {
            var email = jQuery('#EMAIL').val();
            var password = jQuery('#PASSWORD').val();

            jQuery.ajax({
                url: 'login_check.php',
                type: 'post',
                data: 'email=' + email + '&password=' + password,
                success: function (result) {
                    if (result == 'done') {
                        window.location.href = 'guestUser.php';
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

