<?php

    include "021.inc.config2.php";
	date_default_timezone_set('Asia/Jakarta');

   $dateTime = date('Y-m-d H:i:s');
   
   
   $txt = array(
        (isset($_POST["mer_signature"]))? $_POST["mer_signature"] : 'null',
        (isset($_POST["trax_type"]))? $_POST["trax_type"] : 'null',
        (isset($_POST["merchant_id"]))? $_POST["merchant_id"] : 'null',
        (isset($_POST["invoice"]))? $_POST["invoice"] : 'null',
        (isset($_POST["payment_code"]))? $_POST["payment_code"] : 'null',
        (isset($_POST["result_code"]))? $_POST["result_code"] : 'null',
        (isset($_POST["result_desc"]))? $_POST["result_desc"] : 'null',
        (isset($_POST["log_no"]))? $_POST["log_no"] : 'null',
        (isset($_POST["payment_source"]))? $_POST["payment_source"] : 'null',
        $_SERVER["REMOTE_ADDR"],
        $dateTime
    );
    file_put_contents('LogsFinnet.txt', json_encode($txt).PHP_EOL , FILE_APPEND | LOCK_EX);
    //$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
   
    
    $sql = "INSERT INTO psb(
            mer_signature,
            trax_type,
            merchant_id,
            invoice,
            payment_code,
            result_code,
            result_desc,
            log_no,
            payment_source,
            ip,
            lup
        )VALUES(
            '$_POST[mer_signature]',
            '$_POST[trax_type]',
            '$_POST[merchant_id]',
            '$_POST[invoice]',
            '$_POST[payment_code]',
            '$_POST[result_code]',
            '$_POST[result_desc]',
            '$_POST[log_no]',
            '$_POST[payment_source]',
            '$_SERVER[REMOTE_ADDR]',
            '$dateTime'
    )";
    $result = mysqli_query($conn,$sql);
    
    echo $sql;
    
    $resultCode = $_POST['result_code'];
    $resultDesc = $_POST['result_desc'];
    $codeSuccess = $resultCode.'-'.$resultDesc;
    
    mysqli_close($conn);
    
    echo 'berhasil';    
    
    
?>