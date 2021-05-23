<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "https://tech-nitin-online.com/OnlineMobileRecharge/public_html/PaytmKit/callback.php";


/*
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<!------ Include the below in your HEAD tag ---------->
<?php
include "include/head.php";
?>
<!------ Include the above in your HEAD tag ---------->
<body>
	  			<div class="container-fluid">

	  					<!------ Include the below in your NAV tag ---------->
						<?php
						include "include/nav.php";
						?>
						<!------ Include the above in your NAV tag ---------->
						
                      <div class="row ">

							<div class="col-md-4"></div>
							<div class="col-md-4">

									<div class="alert alert-success" style="margin-top:20px;">
									  <strong>Warning!</strong> Please do not refresh this page...
									</div>

								 <ul class="list-group">

								 		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
									
													
											<?php
											foreach($paramList as $name => $value) 
											{
												echo '<li class="list-group-item"><strong>'.$name.':<input type="text" name="' . $name .'" value="' . $value . '"></strong></li>';
											}
											?>
											<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
											
										
										<script type="text/javascript">
											document.f1.submit();
										</script>
									</form>

                             </ul>
							</div>

					</div>
				</div>

	
</body>
</html>
