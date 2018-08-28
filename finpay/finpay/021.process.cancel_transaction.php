<?php

	require_once("021.inc.config.php");
	require_once("021.lib.function.php");
	
	/* ------------------------- PRIMARY PROSES -------------------------- */
	
	/* CREATE SIGNATURE */
	$mer_password = $PASS_021; //IMPORTANT!
	$postdata = array(
		'merchant_id' => $USER_021,  //IMPORTANT!
		'payment_code' => $_POST["payment_code"],  //IMPORTANT!
		'return_url' => $RETURN_URL_021 //IMPORTANT! CHANGE THIS WITH YOUR RETURN TARGET URL!!!
	);
	$mer_signature =  mer_signature($postdata).$mer_password;  //IMPORTANT!
	/* END CREATE SIGANTURE */
	
	/* DATA FOR SENT */
	$postdata = array(
		'mer_signature' => hash256($mer_signature),  //IMPORTANT!
		'merchant_id' => $postdata['merchant_id'],  //IMPORTANT!
		'payment_code' => $postdata['payment_code'],  //IMPORTANT!
		'return_url' => $postdata['return_url'] //IMPORTANT!
	);
	/* END DATA FOR SENT */

	//SENT DATA VIA CURL
	$respon = curl_post($CANCEL_URL_021, $postdata);
	foreach($postdata as $key=>$value){
		echo $key.' : '.$value.'<br />';
	}
	echo "<h2>RESPOND : ";
	if($respon=="00"){ //CANCEL IS SUCCESS
		//DO ACTION WITH YOUR CONDITION
		echo "CANCEL IS SUCCESS";
	}else if($respon=="88"){ //CANCEL IS FAILED BECOUSE ALREADY PAID
		//DO ACTION WITH YOUR CONDITION
		echo "CANCEL IS FAILED BECOUSE ALREADY PAID";
	}else if($respon=="05"){ //CANCEL IS FAILED BECOUSE ALREADY PAID
		//DO ACTION WITH YOUR CONDITION
		echo "CANCEL IS FAILED BECOUSE ALREADY EXPIRED";
	}else if($respon=="06"){ //CANCEL IS FAILED BECOUSE ALREADY PAID
		//DO ACTION WITH YOUR CONDITION
		echo "CANCEL IS FAILED BECOUSE ALREADY CANCEL";
	}else if($respon=="14"){ //NOT FOUND
		//DO ACTION WITH YOUR CONDITION
		echo "NOT FOUND";
	}else{
		//DO ACTION WITH YOUR CONDITION
		echo $respon;
	}
	echo "</h2>";
	//if respon code 00 is Success, antoher respond code is Failed
	
	/* ------------------------- END PRIMARY PROSES -------------------------- */
	
?>