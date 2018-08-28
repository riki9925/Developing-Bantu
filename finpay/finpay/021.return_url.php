<?php
require_once("021.inc.config.php");
require_once("021.lib.function.php");

//IMPORTANT!! This is to tell the engine 021 that the sent data has been accepted by the merchant
//PENTING!! Ini adalah untuk memberitahu mesin 021 bahwa data yang dikirim telah diterima oleh pedagang
echo '00';

//TO WRITE LOG POST FROM 021 RESPON
$log = '';
foreach($_POST as $name=>$value){
	$_POST[$name]=htmlspecialchars(strip_tags(trim($value)));
$log .= $name.' : '.htmlspecialchars(strip_tags(trim($value))).'
';
}

//EXTRACT POST TO VARIABLE
extract($_POST);

//REQUEST CODE 021
if($_POST["trax_type"]=="021Code"){
	$log = '
RESPON REQUEST '.date("Y-m-d h:i:s").' ENGINE 021
'.$log;
	writeLog($log);
	$mer_signature = $_POST["mer_signature"];
	unset($_POST["mer_signature"]);
	unset($_POST["amount"]);
	unset($_POST["paid"]);
	if(check_mer_signature($mer_signature,$_POST,$PASS_021)){ //SECURE DATA
		//DO ACTION WITH YOUR CONDITION
		$sql = 'UPDATE 021_transaction SET trax_type="'.$trax_type.'",payment_code="'.$payment_code.'" WHERE invoice="'.$invoice.'"';
		mysql_query($sql);
	}
}

//PAYMENT SUCCESS RESULT CODE 00
if($_POST["trax_type"]=="Payment" and $_POST["result_code"]=="00" ){
	$log = '
RESPON PAYMENT SUCCESS '.date("Y-m-d h:i:s").' ENGINE 021
'.$log;
	writeLog($log);
	$mer_signature = $_POST["mer_signature"];
	unset($_POST["mer_signature"]);
	unset($_POST["amount"]);
	unset($_POST["paid"]);
	if(check_mer_signature($mer_signature,$_POST,$PASS_021)){ //SECURE DATA
		//DO ACTION WITH YOUR CONDITION
		$sql = 'UPDATE 021_transaction SET trax_type="'.$trax_type.'",result_code="'.$result_code.'",result_desc="'.$result_desc.'",log_no="'.$log_no.'",payment_source="'.$payment_source.'"  WHERE payment_code="'.$payment_code.'"';
		mysql_query($sql);
	}
}

//PAYMENT EXPIRED RESULT CODE 05
if($_POST["trax_type"]=="Payment" and $_POST["result_code"]=="05" ){
	$log = '
RESPON PAYMENT EXPIRED  '.date("Y-m-d h:i:s").' ENGINE 021
'.$log;
	writeLog($log);
	$mer_signature = $_POST["mer_signature"];
	unset($_POST["mer_signature"]);
	unset($_POST["amount"]);
	unset($_POST["paid"]);
	if(check_mer_signature($mer_signature,$_POST,$PASS_021)){ //SECURE DATA
		//DO ACTION WITH YOUR CONDITION
		$sql = 'UPDATE 021_transaction SET trax_type="'.$trax_type.'",result_code="'.$result_code.'",result_desc="'.$result_desc.'",log_no="'.$log_no.'",payment_source="'.$payment_source.'"  WHERE payment_code="'.$payment_code.'"';
		mysql_query($sql);
	}
}

//REQUEST CANCEL TRANSACTION
if($_POST["trax_type"]=="Cancel"){
	$log = '
RESPON CANCEL TRANSACTION '.date("Y-m-d h:i:s").' ENGINE 021
'.$log;
	writeLog($log);
	$mer_signature = $_POST["mer_signature"];
	unset($_POST["mer_signature"]);
	if(check_mer_signature($mer_signature,$_POST,$PASS_021)){ //SECURE DATA
		//DO ACTION WITH YOUR CONDITION
		if($result_code=='00'){
			$sql = 'UPDATE 021_transaction SET trax_type="'.$trax_type.'",result_code="'.$result_code.'",result_desc="'.$result_desc.'"  WHERE payment_code="'.$payment_code.'"';
			mysql_query($sql);
		}else{
			$sql = 'UPDATE 021_transaction SET result_desc="'.$result_desc.'"  WHERE payment_code="'.$payment_code.'"';
			mysql_query($sql);
		}
	}
}

//CHECK STATUS TRANSACTION
if($_POST["trax_type"]=="02111Code"){
	$log = '
CHECK STATUS '.date("Y-m-d h:i:s").' ENGINE 021
'.$log;
	writeLog($log);
	$mer_signature = $_POST["mer_signature"];
	unset($_POST["mer_signature"]);
	unset($_POST["amount"]);
	unset($_POST["paid"]);
	if(check_mer_signature($mer_signature,$_POST,$PASS_021)){ //SECURE DATA
		if($_POST["result_code"]=="00"){ //PAID
			//DO ACTION WITH YOUR CONDITION
		}else if($_POST["result_code"]=="04"){ //UNPAID
			//DO ACTION WITH YOUR CONDITION
		}else if($_POST["result_code"]=="05"){ //EXPIRED
			//DO ACTION WITH YOUR CONDITION
		}else if($_POST["result_code"]=="06"){ //CANCEL
			//DO ACTION WITH YOUR CONDITION
		}else if($_POST["result_code"]=="14"){ //NOT FOUND
			//DO ACTION WITH YOUR CONDITION
		}
	}
}
?>