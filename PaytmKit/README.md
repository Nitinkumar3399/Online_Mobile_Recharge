# How to install the sample test files on a local web server:(wamp/xampp)
 1. Copy zip file in document root of your server (like /var/www/)
 2. login to https://business.paytm.com/ and https://dashboard.paytm.com/next/apikeys to find your test api keys.
 2. Open config_paytm.php file from the lib folder and update the below constant values.
    - PAYTM_MERCHANT_KEY – Provided by Paytm
    - PAYTM_MERCHANT_MID - Provided by Paytm
    - PAYTM_MERCHANT_WEBSITE - Provided by Paytm (Ex: WEBSTAGING for test details)
 3. files:
    - Kart.php – Testing transaction through Paytm gateway.
    - pgRedirect.php – This file has the logic of checksum generation and passing all required parameters to Paytm PG. 
    - callback.php – This file has the logic for processing PG response after the transaction processing.
    - search.php – Testing Status Query API
    - refund.php - This file has a logic to refund the full or partial amount to the client which had previously made. (Note: This file works on curl method and required live web server. free webserver: https://000webhost.com

    
# Video installation demo:  
  You can watch here: https://youtu.be/gvpShOeYd5k

# For Offline(Wallet Api) Checksum Utility below are the methods:
  1. getChecksumFromString : For generating the checksum
  2. verifychecksum_eFromStr : For verifing the checksum
  
     Example code can be find out here: https://github.com/Paytm-Payments/Paytm_App_Checksum_Kit_PHP
  

