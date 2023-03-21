<?php
  include 'connection.php';

  $id = $_GET['id'];
$result = mysqli_query($connection,"SELECT * FROM tbl_cards WHERE id = '$id'");
$test = mysqli_fetch_array($result);


	$date = $test['date'];

	$entity = $test['entity_name'];
	$fund = $test['fund_cluster'];
	$equipment = $test['equipment'];
	$property_no = $test['property_no'];
	$descrip = $test['descrip'];

	$reference = $test['referencenum'];
	$receipt_qty = $test['receipt/qty'];
	$qty = $test['qty'];
	$itd = $test['itd'];
	$balance = $test['balance'];
	$amount = $test['amount'];
	$remarks = $test['remarks'];

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



		.myImages{
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.myImages img{
				margin: 1%;
		}

		.myText{
			font-size: 12px;
			font-weight: 700;
			text-align: center;
		}

		.myText h4{
			font-weight: 700;
			font-size: 10px;
			text-align: center;
		}



	</style>


</head>

<body>

<p style="float: right;">Appendix 69</p>
<br><br>


<div class="myImages ">
<img src="images/dpwh.svg" width="80px">

<div class="myText">
<p>Republic of the Philippines</p>
<h4>DEPARTMENT OF PUBLIC WORKS AND HIGHWAYS</h4>
<h4>REGIONAL OFFICE IX</h4>
<p>Veterans Avenue Extension, Tetuan, Zamboanga City</p>

	</div>

</div><br>

<h2 class="fw-bold text-center">PROPERTY CARD</h2>
<br><br>
<div class="ulabel">
<label><strong>Entity Name: </strong><?php echo $entity; ?></label>
<label style="float: right;"><strong>Fund Cluster: </strong> <?php echo $entity; ?></label>
</div>
<p></p>
<hr>
<table class="table fw-bold" style="width:100%">

	<tr>
<label><strong>Property,Plant and Equipment:</strong>  <?php echo $equipment; ?></label>

<label style="float:right;"><strong>Property No: </strong><?php echo $property_no; ?></label>

<br>
<label style="margin-right: 30%;"><strong>Description: </strong> <?php echo $descrip; ?></label>
<hr>





	<tr>
		<th>Date</th>
		<th>Reference/PAR No.</th>
		<th>Receipt/Qty</th>
		<th>Qty</th>
		<th>Issue/Transfer/Disposal<br>Office/Officer</th>
		<th>Balance</th>
		<th>Amount</th>
		<th>Remarks</th>
	</tr>

<?php
include 'connection.php';

$result = mysqli_query($connection,"SELECT * FROM tbl_cards WHERE id = '$id'");

if($result != null){
while($row = mysqli_fetch_array($result))
  {

?>

	<tr>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['referencenum']; ?></td>
		<td><?php echo $row['receipt/qty']; ?></td>
		<td><?php echo $row['qty']; ?></td>
		<td style="font-size: 13px;"><?php echo $row['itd']; ?></td>
		<td><?php echo $row['balance']; ?></td>
		<td><?php echo $row['amount']; ?></td>
		<td><?php echo $row['remarks']; ?></td>
	</tr>

<?php

}
};

?>	

	
</table>

<script>
	window.print()
</script>


</body>
</html>