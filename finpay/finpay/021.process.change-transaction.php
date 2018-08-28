<?php
//echo '500';
//exit();
//IF POST DATA EXISTS
if($_POST){

//ini_set('display_errors', 0);
//error_reporting(E_ALL ^ E_NOTICE);
include("config.php");
include("function.php");
include("aes.class.php");
include("aesctr.class.php");

$log = nowhour().' REQUEST START
';
$log .= nowhour().' # Source Data
';
foreach($_POST as $name=>$value){
	$_POST[$name]=strip_tags(trim($value));
$log .= nowhour().' - '.$name.' : '.$_POST[$name].'
';
}

extract($_POST);
$amount = $amount+0;

if(!empty($mer_signature)
	&& !empty($merchant_id)
	&& !empty($invoice)
	&& !empty($amount)
	&& !empty($payment_code)
	){
$log .= nowhour().' # Check Merchant
';
	$query = mysql_query('SELECT escrow,prefix_code,merchant_password,merchant_id FROM tmerchant WHERE active=1 and merchant_id="'.$merchant_id.'"');
	if(mysql_num_rows($query)>0){
		$data = mysql_fetch_assoc($query);
		$escrow = $data["escrow"];
		$biller_prefix = $data["prefix_code"];
$log .= nowhour().' - Found Merchant
';
		$merchant_password = AesCtr::decrypt($data["merchant_password"], $data["merchant_id"], 256);
		$real_signature = array();
		$inputs = array("merchant_id","invoice","amount","payment_code");
		foreach($inputs as $input){
			if(!empty($_POST[$input])){
				$real_signature[$input] .= $_POST[$input];
			}
		}
		$source_siganture2 = mer_signature($real_signature).$merchant_password;
		$real_signature = mer_signature($real_signature).$merchant_password;
		$real_signature = hash256($real_signature);
$log .= nowhour().' # Check Signature
';
		if(strtoupper($mer_signature)==strtoupper($real_signature)){ //!empty($mer_signature)
$log .= nowhour().' - Signature is Valid
';
			$query2 = mysql_query("select * from ttranslationcode where trax_type='195Code' and (result_code='' or result_code is null) and merchant_id='".$merchant_id."' and invoice='".$invoice."'");
			if(mysql_num_rows($query2)>0){
				$sql = 'update ttranslationcode set
				amount="'.$amount.'",
				where payment_code="'.$payment_code.'" and merchant_id="'.$merchant_id.'"';
				$sqlexe = mysql_query($sql);	
				if(!$sqlexe){
					@writeLog(mysql_error(),'AUDITRAIL');
				}
				$sql = 'update tcustomer set
				amount="'.$amount.'",
				where customerid="'.$payment_code.'" and BillerPrefix="'.$biller_prefix.'"';
				$sqlexe = mysql_query($sql);
					if(!$sqlexe){
						@writeLog(mysql_error(),'AUDITRAIL');
					}
				$result_code='00';
				$result_desc='Change Success';
				$all= "merchant_id=".$merchant_id."&invoice=".$invoice."&amount=".$amount."&payment_code=".$payment_code."&result_code=".$result_code."&result_desc=".$result_desc."";

$log .= nowhour().' - Process : Success
'.nowhour().' - Source Signature : '.$all.'
';
				echo $all;
				
			}else{
				$result_code='14';
				$result_desc='Data not found';
				$all="merchant_id=".$merchant_id."&invoice=".$invoice."&amount=".$amount."&payment_code=".$payment_code."&result_code=".$result_code."&result_desc=".$result_desc."";

$log .= nowhour().' - Process : Failed
'.nowhour().' - Source Signature : '.$all.'
';
				echo $all;
			}
		}else{
$log .= nowhour().' - Error 01 : Signature Not Valid
'.nowhour().' - Source Signature : '.strtoupper($mer_signature).'-->'.$source_siganture2.'
'.nowhour().' - True Signature : '.strtoupper($real_signature).'
';
			echo '01';
		}
	}else{
$log .= nowhour().' - Error 99 : Merchant Not Found
';
		echo '99 Merchant Not Found';
	}
}else{
$log .= nowhour().' - Error 99 : Source Data Incomplete
';
	echo '99 Source Data Incomplete';
}
$log .= nowhour().' REQUEST END
';

@writeLog($log,$merchant_id);

}
?>
