<?php
mysql_connect("103.15.226.133", "admin", "trimindi173") or die("Could not connect : " . mysql_error());
mysql_select_db("halokick") or die("Could not select database");

$USER_021 = 'AP552'; //USER 021
$PASS_021 = 'AP2017'; //PASS 021

$RETURN_URL_021 = 'http://103.15.226.133/telkomsel/api/payment/response2'; //CLIENT RETURN URL

$BILLHOST_URL = 'https://sandbox.finpay.co.id/servicescode/'; //DEVELOPMENT HOST
//$BILLHOST_URL = 'https://billhosting.finnet-indonesia.com/prepaidsystem/195/'; //PRODUCTION HOST
$REQUEST_URL_021 = $BILLHOST_URL.'va-request-02111.php';
$CHECK_STATUS_URL_021 = $BILLHOST_URL.'check-status.php';
$CANCEL_URL_021 = $BILLHOST_URL.'cancel-transaction.php';  
?>