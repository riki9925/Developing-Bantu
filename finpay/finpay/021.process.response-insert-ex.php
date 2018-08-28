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

function get_increment_no(){
	$query = mysql_query("INSERT INTO 195_increment(no,date) VALUES (null,NOW())");
	if($query){
		$id = mysql_insert_id();
		if($id==9999999){
			mysql_query("INSERT INTO 195_increment_backup(no,date) SELECT no,date FROM 195_increment");
			mysql_query("DELETE FROM 195_increment");
			mysql_query("ALTER TABLE 195_increment AUTO_INCREMENT=1");
		}
	}else{
		$id = get_increment_no();
	}
	return $id;
}
function get_payment_code($prefix=''){
	$id = get_increment_no();
	if($prefix==''){
		if(!empty($id)){
			$payment_code = '019575'.str_pad($id,7,'0',STR_PAD_LEFT);
		}else{
			$payment_code = '019575'.str_pad(rand(1,4999999),7,'0',STR_PAD_LEFT);
		}
	}else{
		$prefixLength = strlen($prefix);
		if($prefixLength==3){
			if(strlen($id)<=4){
				if(!empty($id)){
					$payment_code = '019575'.str_pad($id,4,'0',STR_PAD_LEFT);
				}else{
					$payment_code = '019575'.$prefix.str_pad(rand(1,9999),4,'0',STR_PAD_LEFT);
				}
			}else{
				$payment_code = '019575'.str_pad($id,7,'0',STR_PAD_LEFT);
			}
		}else{
			if(!empty($id)){
				$payment_code = '019575'.str_pad($id,7,'0',STR_PAD_LEFT);
			}else{
				$payment_code = '019575'.str_pad(rand(1,9999999),7,'0',STR_PAD_LEFT);
			}
		}
	}
	$check_ttransaltioncode = mysql_num_rows(mysql_query('select payment_code from ttranslationcode where payment_code="'.$payment_code.'" '));
	if($check_ttransaltioncode==0){
		$check_tcustomer = mysql_num_rows(mysql_query("select customerid from tpaydata where customerid='".$payment_code."' and (substr(localdtime,1,8) between DATE_FORMAT(DATE_ADD(NOW(),INTERVAL -31 DAY),'%Y%m%d') and DATE_FORMAT(NOW(),'%Y%m%d'))"));
		if($check_tcustomer==0){
			$payment_code = $payment_code;
		}else{
			$payment_code = get_payment_code();
		}
	}else{
		$payment_code = get_payment_code();
	}
	return $payment_code;
}

$log = nowhour().' REQUEST START
';
$log .= nowhour().' # Source Data
';
foreach($_POST as $name=>$value){
	$_POST[$name]=strip_tags(trim($value));
	//$_POST[$name]=htmlspecialchars(strip_tags(trim($value)));
$log .= nowhour().' - '.$name.' : '.$_POST[$name].'
';
}

extract($_POST);
$amount = $amount+0;

if(!empty($mer_signature)
	&& !empty($merchant_id)
	&& !empty($invoice)
	&& !empty($amount)
	&& !empty($timeout)
	&& !empty($return_url)
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
		$inputs = array("merchant_id","invoice","amount","add_info1","add_info2","add_info3","add_info4","add_info5","timeout","return_url");
		foreach($inputs as $input){
			if(!empty($_POST[$input])){
				$real_signature[$input] .= $_POST[$input];
			}
		}
		$source_siganture2 = mer_signature($real_signature).$merchant_password;
		//$echoSignature = mer_signature($real_signature);
		$real_signature = mer_signature($real_signature).$merchant_password;
		$real_signature = hash256($real_signature);
$log .= nowhour().' # Check Signature
';
		if(strtoupper($mer_signature)==strtoupper($real_signature)){ //!empty($mer_signature)
$log .= nowhour().' - Signature is Valid
';
			//$payment_code = get_payment_code($biller_prefix);
			$payment_code = get_payment_code("");
			$trax_type = '195Code';
			$result_code = '00';
			$result_desc = 'Success';
			$flag = 0;
			$customer_name = $add_info1;
			//mysql_query("START TRANSACTION");
			$query2 = mysql_query("select * from ttranslationcode where trax_type='195Code' and result_code='' and merchant_id='".$merchant_id."' and invoice='".$invoice."'");
			if(mysql_num_rows($query2)==0){
				$sql = '
				insert into ttranslationcode(
				merchant_id,
				invoice,
				amount,
				flag,
				entry_datetime,
				expired_datetime,
				timeout,
				return_url,
				add_info1,
				add_info2,
				add_info3,
				add_info4,
				add_info5,
				trax_type,
				payment_code)
				values(
				"'.$merchant_id.'",
				"'.$invoice.'",
				"'.$amount.'",
				"'.$flag.'",
				now(),
				DATE_ADD(now(), INTERVAL '.$timeout.' minute),
				"'.$timeout.'",
				"'.$return_url.'",
				"'.strtoupper($add_info1).'",
				"'.strtoupper($add_info2).'",
				"'.strtoupper($add_info3).'",
				"'.strtoupper($add_info4).'",
				"'.strtoupper($add_info5).'",
				"'.$trax_type.'",
				"'.$payment_code.'")';
				$sqlexe = mysql_query($sql);
				if(!$sqlexe){
					@writeLog(mysql_error(),'AUDITRAIL');
				}
				$sql = '
				insert into tcustomer(
				customerid,
				amount,
				FlagStatus,
				CustomerName,
				billinfo1,
				billinfo2,
				billinfo3,
				billinfo4,
				billinfo5,
				billinfo6,
				billinfo7,
				billinfo8,
				billinfo9,
				billinfo10,
				billinfo11,
				billinfo12,
				billinfo13,
				billinfo14,
				billinfo15,
				billinfo16,
				billinfo17,
				billinfo18,
				billinfo19,
				billinfo20,
				BillerPrefix)
				values(
				"'.$payment_code.'",
				"'.$amount.'",
				"'.$flag.'",
				"'.strtoupper($customer_name).'",
				"'.strtoupper($add_info1).'",
				"'.strtoupper($add_info2).'",
				"'.strtoupper($add_info3).'",
				"'.strtoupper($add_info4).'",
				"'.strtoupper($add_info5).'",
				"'.$add_info6.'",
				"'.$add_info7.'",
				"'.$add_info8.'",
				"'.$add_info9.'",
				"'.$add_info10.'",
				"'.$add_info11.'",
				"'.$add_info12.'",
				"'.$add_info13.'",
				"'.$add_info14.'",
				"'.$add_info15.'",
				"'.$add_info16.'",
				"'.$add_info17.'",
				"'.$add_info18.'",
				"'.$add_info19.'",
				"'.$add_info20.'",
				"'.$biller_prefix.'")';
				$sqlexe = mysql_query($sql);
				if(!$sqlexe){
					@writeLog(mysql_error(),'AUDITRAIL');
				}
				$sql = "insert into return_url(date,type,payment_code,return_url,sent,send_status,send_total,content,last_send,BillerPrefix) values(now(),'expired','".$payment_code."','".$return_url."','false','0','0','','','".$biller_prefix."')";
				$sqlexe = mysql_query($sql);
				if(!$sqlexe){
					@writeLog(mysql_error(),'AUDITRAIL');
				}
				$success2 = true;
			}else{
				$resend = true;
				$data2 = mysql_fetch_assoc($query2);
				$payment_code = $data2["payment_code"];
				$sql = 'select FlagStatus from tcustomer where customerid="'.$payment_code.'"';
				$query3 = mysql_query($sql);
				$data3 = mysql_fetch_assoc($query3);
				if($data3["FlagStatus"]=='1'){
					$result_code = '14';
					$result_desc = 'Payment Code Already Paid';
				}
				if($merchant_id=='PLA003' and $data3["FlagStatus"]=='0'){
					$sql = 'update ttranslationcode set
					amount="'.$amount.'",
					entry_datetime=now(),
					expired_datetime=DATE_ADD(now(), INTERVAL '.$timeout.' minute),
					timeout="'.$timeout.'",
					return_url="'.$return_url.'",
					add_info1="'.strtoupper($add_info1).'",
					add_info2="'.strtoupper($add_info2).'",
					add_info3="'.strtoupper($add_info3).'",
					add_info4="'.strtoupper($add_info4).'",
					add_info5="'.strtoupper($add_info5).'"
					where payment_code="'.$payment_code.'" and merchant_id="'.$merchant_id.'"';
					$sqlexe = mysql_query($sql);	
					if(!$sqlexe){
						@writeLog(mysql_error(),'AUDITRAIL');
					}
					$sql = 'update tcustomer set
					amount="'.$amount.'",
					FlagStatus="0",
					CustomerName="'.strtoupper($add_info1).'",
					billinfo1="'.strtoupper($add_info1).'",
					billinfo2="'.strtoupper($add_info2).'",
					billinfo3="'.strtoupper($add_info3).'",
					billinfo4="'.strtoupper($add_info4).'",
					billinfo5="'.strtoupper($add_info5).'",
					billinfo6="'.$add_info6.'",
					billinfo7="'.$add_info7.'",
					billinfo8="'.$add_info8.'",
					billinfo9="'.$add_info9.'",
					billinfo10="'.$add_info10.'",
					billinfo11="'.$add_info11.'",
					billinfo12="'.$add_info12.'",
					billinfo13="'.$add_info13.'",
					billinfo14="'.$add_info14.'",
					billinfo15="'.$add_info15.'",
					billinfo16="'.$add_info16.'",
					billinfo17="'.$add_info17.'",
					billinfo18="'.$add_info18.'",
					billinfo19="'.$add_info19.'",
					billinfo20="'.$add_info20.'"
					where customerid="'.$payment_code.'" and BillerPrefix="'.$biller_prefix.'"';
					$sqlexe = mysql_query($sql);
					if(!$sqlexe){
						@writeLog(mysql_error(),'AUDITRAIL');
					}
					$sql = "update return_url set date=now(),return_url='".$return_url."',sent='false',send_status='0',send_total='0',content='',last_send='' where type='expired' and payment_code='".$payment_code."' and BillerPrefix='".$biller_prefix."'";
					$sqlexe = mysql_query($sql);
					if(!$sqlexe){
						@writeLog(mysql_error(),'AUDITRAIL');
					}
				}
				$success2 = true;
			}
			if($success2 == true){
				$postdata = array(
					'trax_type' => $trax_type,
					'merchant_id' => $merchant_id,
					'invoice' => $invoice,
					'payment_code' => $payment_code
				);
				$mer_signature2 =  mer_signature($postdata).$merchant_password;
				$mer_signature =  hash256(mer_signature($postdata).$merchant_password);
				$postdata = array(
					'mer_signature' => $mer_signature,//strtoupper($mer_signature)
					'trax_type' => $trax_type,
					'merchant_id' => $merchant_id,
					'invoice' => $invoice,
					'payment_code' => $payment_code);
				$log .= nowhour().' # Try Send Data To '.$return_url.' and '.$mer_signature2.'
';
				foreach($postdata as $k=>$v){
					$log .= nowhour().' - '.$k.' : '.$v.'
';
				}
				echo "mer_signature=".$mer_signature."&trax_type=".$trax_type."&merchant_id=".$merchant_id."&invoice=".$invoice."&payment_code=".$payment_code."";
				/*
				$source_domain = str_replace("https://","",$return_url);
				$source_domain = str_replace("http://","",$source_domain);
				$source_domain = explode("/",$source_domain);
				$domain = $source_domain[0];
				if(substr($return_url,0,5)=="https"){
					$source_port = explode(':',$domain);
					if(!empty($source_port[1])){
						$domain = $source_port[0];
						$port = $source_port[1];
					}else{
						$port = 443;
					}
				}else{
					$source_port = explode(':',$domain);
					if(!empty($source_port[1])){
						$domain = $source_port[0];
						$port = $source_port[1];
					}else{
						$port = 80;
					}
				}
$log .= nowhour().' # Respond Server Client
';
				$fp = @fsockopen($domain, $port, $errno, $errstr, 10);
				if ($fp) {
					$respon = curl_post($return_url,$postdata);
					$respon = trim($respon);
					if($respon!=""){
						echo '00';
$log .= nowhour().' - Server Client Active. Grab Content : '.substr($respon,0,6).'
';
						//mysql_query("COMMIT");
					}else{
						echo '503 Server Client Unknown/Down/Timeout/Web Conetent Is Null';
$log .= nowhour().' - Error 503 : Server Client Unknown/Down/Timeout/Web Conetent Is Null
';
					//mysql_query("ROLLBACK");
					}
				}else{
					echo '503 Server Client Unknown/Down';
$log .= nowhour().' - Error 503 : Server Client Unknown/Down
';
					//mysql_query("ROLLBACK");
				}
				*/
			}
			else{
				//mysql_query("ROLLBACK");
				$log .= nowhour().' - Error 500 : Internal Server Error
';
				echo '500';
			}
		}else{
$log .= nowhour().' - Error 01 : Signature Not Valid
'.nowhour().' - Signature Component : '.strtoupper($source_siganture2).'
'.nowhour().' - Source Signature : '.strtoupper($mer_signature).'
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
