<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<!------ Include the below in your HEAD tag ---------->
<?php
include "include/head.php";
?>
<!------ Include the above in your HEAD tag ---------->
<body>

<div class="container search-table" style="margin-top:40px;padding: 30px;border-radius: 5px;">

	<!------ Include the below in your NAV tag ---------->
	<?php
	include "include/nav.php";
	?>
	<!------ Include the above in your NAV tag ---------->

	<form method="post" action="">
            <div class="search-box">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Transaction status query</h4>
                    </div>
                    <div class="col-md-7">
                        <input type="text"  id="ORDER_ID"  name="ORDER_ID" class="form-control" placeholder="Enter ORDER_ID" value="<?php echo $ORDER_ID ?>">
                        
                    </div> 
                     <div class="col-md-2">
                        
                        <input value="Search" class="btn btn-success" type="submit"	onclick="">
                    </div> 
                </div>
            </div>
	<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>    
            <div class="search-list">
                <h3>Response of status query:</h3>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>ATTRIBUTE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    
		               <?php
							foreach($responseParamList as $paramName => $paramValue) {
						?>
						
                    <tr >
                        <td><?php echo $paramName?></td>
                        <td><?php echo $paramValue?></td>
                    </tr>
	                   	<?php
								}
							?> 

					
                    </tbody>
                </table>

            </div>

        <?php
		}
		?>
        </form>
      
        </div>
</body>
</html>