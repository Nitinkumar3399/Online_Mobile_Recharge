<!-- Head tag start here-->
<?php

include "include/head.php";

?>
<!-- Head tag end here-->

<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");


if(isset($_POST['submit']))
{
      
      
    /* initialize an array */
    $paytmParams = array();
    
    /* body parameters */
    $paytmParams["body"] = array(
    
        /* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
        "mid" => PAYTM_MERCHANT_MID,
    
        /* This has fixed value for refund transaction */
        "txnType" => "REFUND",
    
        /* Enter your order id for which refund needs to be initiated */
        "orderId" => $_POST['Order_id'],
    
        /* Enter transaction id received from Paytm for respective successful order */
        "txnId" => $_POST['tnx_id'],
    
        /* Enter numeric or alphanumeric unique refund id */
        "refId" => $_POST['ref_id'],
    
        /* Enter amount that needs to be refunded, this must be numeric */
        "refundAmount" => $_POST['ref_amt'],
    );
    
    /**
    * Generate checksum by parameters we have in body
    * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
    */
    $checksum = getChecksumFromString(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PAYTM_MERCHANT_KEY);
    
    /* head parameters */
    $paytmParams["head"] = array(
    
        /* This is used when you have two different merchant keys. In case you have only one please put - C11 */
        "clientId"	=> "C11",
    
        /* put generated checksum value here */
        "signature"	=> $checksum
    );
    
    /* prepare JSON string for request */
    $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
    
    /* for Staging */
    $url = "https://securegw-stage.paytm.in/refund/apply";
    
    /* for Production */
    // $url = "https://securegw.paytm.in/refund/apply";


    function curl_request($url,$post_data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        return $response;
    }
      

        $output= curl_request($url,$post_data); //function calling
        $json = json_decode($output);
        $base_path = $json->body->resultInfo;
      
}


curl_close($ch);
?>
<pre><strong>RAW DATA:</strong> <?php echo (isset($output)) ? var_dump($output) : 'NULL'; ?></pre>

<body>
    <!-- nav tag start here-->
   <?php

    include "include/nav.php";
    
    ?>
    <!-- nav tag end here-->
    
  <div class="container">
       <table class="table table-striped">
          <tbody>
             <tr>
                 
                 <?php 
                      if(isset($output) && $output !=='')
                      {
                          
                          if($base_path->resultStatus == 'TXN_SUCCESS')
                          {
                              echo '<div class="alert alert-success" role="alert">';
                              echo  '<i class="fas fa-check-circle" ></i> '.$base_path->resultCode.' : '.$base_path->resultStatus.' : '.$base_path->resultMsg;    
                              echo  '</div>';
                          }
                         else if($base_path->resultStatus == 'PENDING')
                          {
                              echo '<div class="alert alert-warning" role="alert">';
                              echo  '<i class="fas fa-clock" ></i> '.$base_path->resultCode.' : '.$base_path->resultStatus.' : '.$base_path->resultMsg;
                              echo  '</div>';
                          }
                          
                          else
                          {
                              echo '<div class="alert alert-danger" role="alert">';
                              echo  '<i class="fas fa-times-circle" ></i> '.$base_path->resultCode.' : '.$base_path->resultStatus.' : '.$base_path->resultMsg;   
                              echo  '</div>';
                          }
                      }
                 ?>
                 
                
                
                <td colspan="1">
                    <H1>Refund (<a href="https://developer.paytm.com/docs/refund-api" target="_blank">Refund API</a>)</H1>
                    <small><i class="fas fa-info-circle"></i> <strong>GET Refund Detail & status:</strong> <a href="search.php" target="_blank">Here</a></small></br>
                    <small><i class="fas fa-info-circle"></i> <strong>Refund Responce Codes:</strong> <a href="https://developer.paytm.com/docs/refund-api/?ref=refunds#RespCode" target="_blank">Here</a></small></br>
                    <small><i class="fas fa-info-circle"></i> <strong>Side Note:</strong> You can only initiate refund amount upto 6 times on a single transaction.</small>
                   <form class="well form-horizontal" method="post">
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-3 control-label">Order ID</label>
                            <div class="col-md-9 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">
                                   <i class="fas fa-id-card-alt"></i></span>
                                   <input  placeholder="ORDSxxxxxxx" class="form-control" required="true" name="Order_id" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label">TNX ID</label>
                            <div class="col-md-9 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">
                                   <i class="fas fa-id-card-alt"></i></span>
                                   <input  placeholder="Ex: 202005071112128001101681xxxxx530187" class="form-control" required="true" name="tnx_id" type="text">
                                  </div>
                            </div>
                         </div>
                       
                         
                          <div class="form-group">
                            <label class="col-md-3 control-label">Refund ID (Randomly generated)</label>
                            <div class="col-md-9 inputGroupContainer">
                             <div class="input-group"><span class="input-group-addon">
                                   <i class="fas fa-id-card-alt"></i></span>
                                   <input placeholder="Random ID" class="form-control" required="true" name="ref_id" value="<?php echo  "REFID" . rand(10000,99999999)?>" type="text">
                                  </div>
                            </div>
                         </div>
                         
                           <div class="form-group">
                            <label class="col-md-3 control-label">Refund Amount</label>
                            <div class="col-md-9 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon">
                                   <i class="fas fa-rupee-sign"></i></span>
                                   <input  placeholder="0.00" class="form-control" required="true" name="ref_amt" type="text" >
                                  </div>
                            </div>
                         </div>
                        
                           <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9 inputGroupContainer">
                              <button type="submit" class="btn btn-success" name="submit">Initiate Refund</button>
                            </div>
                         </div>
                     
                        
                      </fieldset>
                   </form>
                </td>
               
             </tr>
          </tbody>
       </table>
    </div>
   
</body>
