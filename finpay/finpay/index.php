<html>
<head>
<title>Finnet 021 Merchant Simulator</title>
</head>
<body>
<h1>Finnet 021 Merchant Simulator</h1>
<table border="1">
<tr valign="top"><td>
	<?php
	$invoice = rand("10000000","99999999");
	?>
	<h2>1. Request</h2>
	<form method="post">
	<input type="hidden" name="action" value="021_REQUEST" />
	<table>
		<tr><td>Invoice</td><td><input type="text" name="invoice" value="<?php echo $invoice; ?>"></td></tr>
		<tr><td>Amount</td><td><input type="text" name="amount" value="1000"></td></tr>
		<tr><td>Add Info 1</td><td><input type="text" name="add_info1" value="<?php echo "INVOICE ".$invoice; ?>"></td></tr>
		<?php
		for($i=2;$i<=5;$i++){
		echo '
		<tr><td>Add Info '.$i.'</td><td><input type="text" name="add_info'.$i.'"></td></tr>';
		}
		?>
		<tr><td>&nbsp;</td><td><input type="submit" value="SEND"></td></tr>
	</table>
	<?php
	if($_POST["action"]=="021_REQUEST"){
		echo '<hr />';
		require_once("021.process.request.php");
	}
	?>
	</form>
</td><td>
	<h2>2. Check Status</h2>
	<form method="post">
	<input type="hidden" name="action" value="021_CHECK_STATUS" />
	<table>
		<tr><td>021 Payment Code</td><td><input type="text" name="payment_code" value="021"></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="SEND"></td></tr>
	</table>
	<?php
	if($_POST["action"]=="021_CHECK_STATUS"){
		echo '<hr />';
		require_once("021.process.check_status.php");
	}
	?>
	</form>
</td><td>
	<h2>3. Cancel</h2>
	<form method="post">
	<input type="hidden" name="action" value="021_CANCEL_TRANSACTION" />
	<table>
		<tr><td>021 Payment Code</td><td><input type="text" name="payment_code" value="0195"></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="SEND"></td></tr>
	</table>
	<?php
	if($_POST["action"]=="021_CANCEL_TRANSACTION"){
		echo '<hr />';
		require_once("021.process.cancel_transaction.php");
	}
	?>
	</form>
</td><td>
	<h2>4. Payment Simulator</h2>
	<iframe src="https://sandbox.finpay.co.id/servicescode/payment-process.php" style="width:350px; height:200px;"></iframe>
	<br /><font color="red">NOTE : JUST WORK IN DEVELOPMENT HOST</font>
</td></tr>
</table>
<h1>Attention :</h1>
- Open and Read file <a href="README_FIRST.txt">README_FIRST.txt</a><br />
- Open and Read file <a href="021.Guide.pdf">021.Guide.pdf</a><br />
- Create database "021_dummy" and Upload this file <a href="021_dummy.sql">021_dummy.sql</a>
</body>
</html>