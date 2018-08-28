<script src="jquery.min.js" type="text/javascript"></script>
<?php

	function mer_signature($array){
	  ksort ($array);
	  $output = '';
	  foreach($array as $key=>$val){
	    if(!empty($val) && $key!='fin_securehash'){
	      $output .= $val.'%';
	    }
	  }
	  return strtoupper($output);
	}
	function curl_post($url, $postdata, $timeout=0){
	  $sentdata = '';
	  if(is_array($postdata)){
	    foreach($postdata as $name=>$value){
	      $sentdata .= $name.'='.$value.'&';
	    }
	  }
	  $sentdata = rtrim($sentdata,'&');
	  $ssl_active = false;
	  if(substr($url,0,5)=="https"){
	    $ssl_active = true;
	  }
	  $proxy = '';
	  $channel = curl_init($url);
	  curl_setopt ($channel, CURLOPT_POST, 1);
	  curl_setopt ($channel, CURLOPT_PROXY, $proxy);
	  curl_setopt ($channel, CURLOPT_POSTFIELDS, $sentdata);
	  curl_setopt ($channel, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt ($channel, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt ($channel, CURLOPT_AUTOREFERER, 1);
	  curl_setopt ($channel, CURLOPT_URL, $url);
	  if($ssl_active==true){
	    curl_setopt ($channel, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt ($channel, CURLOPT_SSL_VERIFYHOST, 0);
	  }
	  if($timeout>0){
	    curl_setopt ($channel, CURLOPT_CONNECTTIMEOUT, $timeout );
	    curl_setopt ($channel, CURLOPT_TIMEOUT, $timeout );
	  }
	  $output = curl_exec($channel);
	  curl_close   ($channel);
	  return $output;
	}
	if($_POST){
		
	  // echo $_POST;
	  // echo "string";
	  var_dump($_POST);
	  //return;
		$param = $_POST;
		$key='yUYAP5srcytlUndomesZSg==';
		$signatureNya = mer_signature($param).$key;
		$signature = hash('SHA256',$signatureNya);
		$param['fin_securehash'] = $signature;
		$url = 'https://finpaydev.finnet-indonesia.com/payment/getLink.php';
		$kirim = curl_post($url, $param);
		$kirimDecode = json_decode($kirim,true);
		$urlNya = $kirimDecode['redirecturl'];
		echo '<script>
			
	      var frame = document.getElementById("votar");
	      frame.action = "'.$kirimDecode.'";


	  </script>';
	}








?>




<script type="text/javascript">
  $(document).ready(function() {
    alert("load");
  });

  
</script>







<html>
<body>




<iframe id="votar" name="votar" src=""></iframe>
<form id="action2"  method="POST" target="votar">
    <fieldset>
      <legend>Transaction Detail</legend>
      <table>
        <tr><td width="160">Merchant ID</td><td><input type="text" name="merchant_id" size="13" maxlength="13"  value="wifiid001"></td></tr>
        <tr><td width="160">Self Form</td><td><input type="text" name="self_form" size="13" maxlength="1"  value="N"></td></tr>
        <tr><td width="160">Transaction Type</td><td><input type="text" name="trx_type" size="3" maxlength="2"  value="Pay"></td></tr>
        <tr><td width="160">Product Type</td><td><input type="text" name="trx_prod" size="10" maxlength="10"  value="ecom"></td></tr>
        <tr><td width="160">Amount</td><td><input type="text" name="trx_amount" size="10" maxlength="10" value="50000"></td></tr>
        <tr><td width="160">Transaction Number</td><td><input type="text" name="trx_invoice" size="34" maxlength="34"  value="<?php echo 'HKICK'.date('YmdHis').rand(0,100);?>"></td></tr>
        <tr><td width="160">Transaction Date</td><td><input type="text" name="trx_date" size="34" maxlength="34"  value="<?php echo date('YmdHis');?>"></td></tr>
        <tr><td width="160">Return URL</td><td><input type="text" name="trx_returnurl" size="100" maxlength="100"  value="http://103.15.226.133/telkomsel/success_1/"></td></tr>
        <tr><td width="160">Success URL</td><td><input type="text" name="trx_successurl" size="100" maxlength="100"  value="http://103.15.226.133/telkomsel/success_1/"></td></tr>
        <tr><td width="160">Failed URL</td><td><input type="text" name="trx_failedurl" size="100" maxlength="100"  value="http://103.15.226.133/telkomsel/failed/"></td></tr>
      </table>
      </fieldset>
      <fieldset>
      <legend>Customer Detail</legend>
      <table>
        <tr><td width="160">Customer ID</td><td><input type="text" name="cust_id" size="16" maxlength="16"  value="081286288889"></td></tr>
        <tr><td width="160">Customer Phone</td><td><input type="text" name="cust_msisdn" size="16" maxlength="16" value="081286288844"></td></tr>
        <tr><td width="160">Customer Email</td><td><input type="text" name="cust_email" size="16" maxlength="16"  value="finpay@gmail.com"></td></tr>
        <tr><td width="160">Customer Name</td><td><input type="text" name="cust_name" size="16" maxlength="16" value="Finpay"></td></tr>
      </table>
      </fieldset>
      <input id="go"  type="submit" value="PROSES" />            
</form>





</body>
</html>