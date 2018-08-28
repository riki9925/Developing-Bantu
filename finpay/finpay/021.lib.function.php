<?php
function curl_post($url, $postdata, $timeout=0){
	$sentdata = '';
	foreach($postdata as $name=>$value){
		$sentdata .= $name.'='.$value.'&';
	}
	$sentdata = rtrim($sentdata,'&');
	$ssl_active = false;
	if(strtolower(substr($url,0,5))=="https"){
		$ssl_active = true;
	}
	$channel = curl_init($url);
	curl_setopt ($channel, CURLOPT_HEADER, false);
	curl_setopt ($channel, CURLINFO_HEADER_OUT, false);
	curl_setopt	($channel, CURLOPT_POST, 1);
	curl_setopt	($channel, CURLOPT_POSTFIELDS, $sentdata);
	curl_setopt	($channel, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($channel, CURLOPT_ENCODING, "");
    curl_setopt ($channel, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($channel, CURLOPT_AUTOREFERER, 1);
	curl_setopt ($channel, CURLOPT_URL, $url);
	if($ssl_active==true){
		//curl_setopt ($channel, CURLOPT_PORT , 443);
		curl_setopt ($channel, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt ($channel, CURLOPT_SSL_VERIFYHOST, 0);
	}
	if($timeout>0){
		curl_setopt ($channel, CURLOPT_CONNECTTIMEOUT, $timeout );
		curl_setopt ($channel, CURLOPT_TIMEOUT, $timeout );
	}
    curl_setopt ($channel, CURLOPT_MAXREDIRS, 10);
    curl_setopt ($channel, CURLOPT_VERBOSE, 1);
	$output = curl_exec($channel);
	curl_close 	($channel);
	return $output;
}

function mer_signature($array){
	$output = '';
	foreach($array as $key=>$val){
		if(!empty($val)){
			$output .= $val.'%';
		}
	}
	return strtoupper($output);
}

function check_mer_signature($mer_signature,$array,$password){
	$comparator = mer_signature($array).$password;
	if(strtoupper($mer_signature)==strtoupper(hash256($comparator))){
		return true;
	}else{
		return false;
	}
}

function hash256($input){
	return hash("sha256",$input);
}

function writeLog($text,$prefix='195log'){
	$fileurl = ''.$prefix.'_'.date('Ymd').'.txt';
	if(file_exists($fileurl)){
		if (!$handle = fopen($fileurl, 'a+')) {
			echo 'Cannot open file ('.$fileurl.')';
			exit;
		}
	}else{
		if (!$handle = fopen($fileurl, 'w')) {
			echo 'Cannot create file ('.$fileurl.')';
			exit;
		}
		@chmod($fileurl,0777);
	}
	if (fwrite($handle, $text."
") === FALSE) {
		echo 'Cannot write to file ('.$fileurl.')';
		exit;
	}
	fclose($handle);
}
?>