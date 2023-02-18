<?php
  include 'connection.php';

  $id = $_GET['id'];
$result = mysqli_query($connection,"SELECT * FROM tbl_stocks WHERE id = '$id'");
$test = mysqli_fetch_array($result);

	$entity = $test['entity_name'];
	$cluster = $test['fund_cluster'];
	$descrip = $test['descrip'];
	$item = $test['item'];
	$unit = $test['unit_m'];
	$stock_no = $test['stock_no'];
	$re_order = $test['re_order'];
	$date = $test['date'];
	$reference = $test['reference'];
	$receipt_qty = $test['receipt_qty'];
	$issue_qty = $test['issue_qty'];
	$issue_office = $test['issue_office'];
	$balance_qty = $test['balance_qty'];
	$consume = $test['consume'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stocks</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<style>
		
		*{
			font-weight: bold;
		}

	</style>


</head>

<body>

<h1>Stock Card</h1>
<h3>SPMS</h3>
<hr>
<div class="ulabel">
<label>Entity Name: <?php echo $entity; ?></label>
<label style="margin-left: 30%; float: right;">Fund Cluster: <?php echo $cluster; ?></label>
</div>
<p></p>
<table class="table">

	<thead>
		<th>Item :</th>
		<td><?php echo $item; ?></td>
		<th>Stock No :</th>
		<td><?php echo $stock_no; ?></td>
	</thead>

	<tr>
		<th>Description :</th>
		<td><?php echo $descrip; ?></td>
		<th>Re-order Point :</th>
		<td><?php echo $re_order; ?></td>
	</tr>

	<tr>
		<th>Unit of Measurement :</th>
		<td><?php echo $unit; ?></td>
	</tr>

	<tr>
		<th>Date</th>
		<th>Reference</th>
		<th>Receipt/Qty</th>
		<th>Issue/Qty</th>
		<th>Issue/Office</th>
		<th>Balance/Qty</th>
		<th>No. of Days to Consume</th>
	</tr>

	<tr>
		<td><?php echo $date; ?></td>
		<td><?php echo $reference; ?></td>
		<td><?php echo $receipt_qty; ?></td>
		<td><?php echo $issue_qty; ?></td>
		<td><?php echo $issue_office; ?></td>
		<td><?php echo $balance_qty; ?></td>
		<td><?php echo $consume; ?></td>
	</tr>
</table>

</body>
</html>