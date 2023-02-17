<?php

include('connection.php');

if(isset($_POST['send']))
{
	$entity = $_POST['entity'];
	$cluster = $_POST['cluster'];
	$descrip = $_POST['descrip'];
	$item = $_POST['item'];
	$unit = $_POST['unit'];
	$stock_no = $_POST['stock_no'];
	$re_order = $_POST['re_order'];
	$date = $_POST['date'];
	$reference = $_POST['reference'];
	$receipt_qty = $_POST['receipt_qty'];
	$issue_qty = $_POST['issue_qty'];
	$issue_office = $_POST['issue_office'];
	$balance_qty = $_POST['balance_qty'];
	$consume = $_POST['consume'];

	    
        $stmt = $conn->prepare("INSERT INTO `tbl_stocks`(`entity_name`,`fund_cluster`,`item`,`descrip`,`unit_m`,`stock_no`,`re_order`,`date`,`reference`,`receipt_qty`,`issue_qty`,`issue_office`,`balance_qty`,`consume`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("ssssssssssssss",$entity,$cluster,$item,$descrip,$unit,$stock_no,$re_order,$date,$reference,$receipt_qty,$issue_qty,$issue_office,$balance_qty,$consume);
        $stmt->execute();
        
        
        $var = 'Stock Card has been saved!';
        $message = 'Proceed to the dashboard to print the stock card information!';

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { swal('$var','$message','success')";
            echo '}, 1000);</script>';
		

        $stmt-> close();
        $conn->close();	    

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPMS Stock Cards</title>

	<script src="js/sweetalert.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<style>
		body{
			background-color: #BDCDD6 !important;
		}
	</style>

</head>

<body>


<fieldset class="field_set">
	<legend>Stock Card<br>SPMS</legend>

	<a href="dashboard.php"><button class="btn btn-primary">Dashboard</button></a>
	<hr>
	<form class="row g-3" method="POST" action="">

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Entity Name</label>
	    <input type="text" name="entity" class="form-control" id="inputEmail4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Fund Cluster</label>
	    <input type="text" name="cluster" class="form-control" id="inputEmail4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Item</label>
	    <input type="text" name="item" class="form-control" id="inputEmail4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputPassword4" class="form-label">Description</label>
	    <input type="text" name="descrip" class="form-control" id="inputPassword4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Unit of Measurement</label>
	    <input type="text" name="unit" class="form-control" id="inputEmail4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Stock No.</label>
	    <input type="text" name="stock_no" class="form-control" id="inputEmail4">
	  </div>

	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Re-order Point.</label>
	    <input type="text" name="re_order" class="form-control" id="inputCity">
	  </div>
	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Date</label>
	    <input type="text" name="date" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="inputCity">
	  </div>
	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Reference</label>
	    <input type="text" name="reference" class="form-control" id="inputCity">
	  </div>
	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Receipt/Qty</label>
	    <input type="text" name="receipt_qty" class="form-control" id="inputCity">
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Issue/Qty</label>
	    <input type="text" name="issue_qty" class="form-control" id="inputCity">
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Issue/Office</label>
	    <input type="text" name="issue_office" class="form-control" id="inputCity">
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Balance/Qty</label>
	    <input type="text" name="balance_qty" class="form-control" id="inputCity">
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">No. of Days to Consume</label>
	    <input type="text" name="consume" class="form-control" id="inputCity">
	  </div>


	  <div class="col-12">
	    <button type="submit" name="send" class="btn btn-primary insertbtn">Save Information</button>
	  </div>
	</form>
</fieldset><br><br>

<div class="img">
	<img src="images/wmsu.png" width="200px">
	<img src="images/remove.png" width="200px">
	<img src="images/dpwh.svg" width="200px">
	<p>&#169; Western Mindanao State University Interns</p>
	<p>College of Computing Studies 2023</p>
	<br><br>
</div>

</body>

</html>