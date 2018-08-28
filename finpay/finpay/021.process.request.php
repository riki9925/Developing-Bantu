<?php

	require_once("021.inc.config.php");
	require_once("021.lib.function.php");
	
	/* ------------------------- PRIMARY PROSES -------------------------- */
	
	/* CREATE SIGNATURE */
	$mer_password = $PASS_021; //IMPORTANT!
	$postdata = array(
		'merchant_id' => $USER_021,  //IMPORTANT!
		'invoice' => $_POST["invoice"],  //IMPORTANT!
		'amount' => $_POST["amount"],  //IMPORTANT!
		'add_info1' => $_POST["add_info1"],  //Customer Name //IMPORTANT!
		'add_info2' => $_POST["add_info2"],
		'add_info3' => $_POST["add_info3"],
		'add_info4' => $_POST["add_info4"],
		'add_info5' => $_POST["add_info5"],
		'timeout' => '1', //60 Menit (Expired Date)  //IMPORTANT!
		'return_url' => $RETURN_URL_021 //IMPORTANT! CHANGE THIS WITH YOUR RETURN TARGET URL!!!
	);
	$mer_signature =  mer_signature($postdata).$mer_password;  //IMPORTANT!
	/* END CREATE SIGANTURE */
	
	/* DATA FOR SENT */
	$postdata = array(
		'mer_signature' => strtoupper(hash256($mer_signature)),  //IMPORTANT!
		'merchant_id' => $postdata['merchant_id'],  //IMPORTANT!
		'invoice' => $postdata['invoice'],  //IMPORTANT!
		'amount' => $postdata['amount'],  //IMPORTANT!
		'add_info1' => $postdata['add_info1'], //Customer Name //IMPORTANT!
		'add_info2' => $postdata['add_info2'],
		'add_info3' => $postdata['add_info3'],
		'add_info4' => $postdata['add_info4'],
		'add_info5' => $postdata['add_info5'],
		'timeout' => $postdata['timeout'], //IMPORTANT!
		'return_url' => $postdata['return_url'] //IMPORTANT!
	);
	/* END DATA FOR SENT */
	
	//INSERT DATA TO DATABASE
	$insert = @mysql_query("INSERT INTO psb (invoice,amount,add_info1,add_info2,add_info3,add_info4,add_info5,timeout,return_url) VALUES ('".$postdata["invoice"]."','".$postdata["amount"]."','".$postdata["add_info1"]."','".$postdata["add_info2"]."','".$postdata["add_info3"]."','".$postdata["add_info4"]."','".$postdata["add_info5"]."','".$postdata["timeout"]."','".$postdata["return_url"]."')");
	
	//SENT DATA VIA CURL
	$respon = curl_post($REQUEST_URL_021, $postdata);
	
	//echo $respon;
	//if respon code 00 is Success, antoher respond code is Failed	
	foreach($postdata as $key=>$value){
		echo $key.' : '.$value.'<br />';
	}
	//SELECT DATA INTO DB IF RESPON IS "00"
	if($respon=='00'){	
		$query = mysql_query("SELECT payment_code FROM psb WHERE invoice='".$postdata["invoice"]."' order by id desc limit 1");
		$data = mysql_fetch_assoc($query);
		echo "<h3>021 Payment Code : ".$data["payment_code"]."<h3>";
	}else{
		echo "<h3>Error Code : ".$respon."</h3>";
	}
	
	/* ------------------------- END PRIMARY PROSES -------------------------- */
	
?>