<?php

include('connection.php');

if(isset($_POST['send']))
{
	$entity = $_POST['entity'];
	$cluster = $_POST['cluster'];
	$equipment = $_POST['equipment'];
	$property = $_POST['property_no'];
	$descrip = $_POST['descrip'];
	$date = $_POST['date'];
	$reference = $_POST['reference'];
	$receipt_qty = $_POST['receipt_qty'];
	$qty = $_POST['qty'];
	$amount = $_POST['amount'];
	$disposal = $_POST['disposal'];
	$balance = $_POST['balance'];
	$remarks = $_POST['remarks'];

	    
        $stmt = $conn->prepare("INSERT INTO `tbl_cards`(`date`,`entity_name`,`fund_cluster`,`equipment`,`property_no`,`descrip`,`referencenum`,`receipt`,`qty`,`itd`,`balance`,`amount`,`remarks`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssssssss",$date,$entity,$cluster,$equipment,$property,$descrip,$reference,$receipt_qty,$qty,$disposal,$balance,$amount,$remarks);
        $stmt->execute();
        
        
        $var = 'Property Card has been saved!';
        $message = 'Proceed to the dashboard to view and print the Property Card information';

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
	<title>SPMS Property Cards</title>

	<script src="js/sweetalert.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<style>
        .page-bg {
              background:url('images/dpwh.jpg');
              filter: brightness(40%);
              background-size: cover;
              position: fixed;
              width: 100%;
              height: 100%;
              top: 0;
              left: 0;
              z-index: -1;
        }

        .field_set{
        	background-color: #fff;
        	border-radius: 25px;
        	padding: 2%;
        }

        .field_set legend{
        	font-weight: bold;
        }

        label{
        	font-weight: bold;
        }
	</style>

</head>

<body>

<div class="page-bg"></div>

<fieldset class="field_set shadow">
	<legend>Property Card<br>Supply and Property Management Section</legend><br><br>

	<a href="dashboard.php"><button class="btn btn-primary">Dashboard</button></a>
	<hr>
	<form class="row g-3" method="POST" action="">

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Entity Name</label>
	    <input type="text" name="entity" class="form-control" id="inputEmail4" required>
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Fund Cluster</label>
	    <input type="text" name="cluster" class="form-control" id="inputEmail4" required>
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Property,Plant and Equipment</label>
	    <input type="text" name="equipment" class="form-control" id="inputEmail4" required>
	  </div>

	  <div class="col-md-6">
	    <label for="inputPassword4" class="form-label">Property No</label>
	    <input type="text" name="property_no" class="form-control" id="inputPassword4" required>
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Description</label>
	    <input type="text" name="descrip" class="form-control" id="inputEmail4" required>
	  </div>

	  <div class="col-md-6">
	    <label for="inputEmail4" class="form-label">Referrence/PAR No.</label>
	    <input type="text" name="reference" class="form-control" id="inputEmail4" required>
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Date</label>
	    <input type="text" name="date" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="inputCity" required>
	  </div>


	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Receipt/Qty</label>
	    <input type="text" name="receipt_qty" class="form-control" id="inputCity" required>
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Quantity</label>
	    <input type="text" name="qty" class="form-control" id="inputCity" required>
	  </div>
	  
	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Balance</label>
	    <input type="text" name="balance" class="form-control" id="inputCity" required>
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Amount</label>
	    <input type="text" name="amount" class="form-control" id="inputCity" required>
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Remarks</label>
	    <input type="text" name="remarks" class="form-control" id="inputCity" required>
	  </div>

	  	  <div class="col-md-6">
	    <label for="inputCity" class="form-label">Issue/Transfer/Disposal</label>
	    <textarea class="form-control" name="disposal" id="floatingTextarea2" style="height: 100px"></textarea>
	  </div>


	  <div class="col-12">
	    <button type="submit" name="send" class="btn btn-primary insertbtn">Save Information</button>
	  </div>
	</form>

	<div class="img">
	<img src="images/wmsu.png" width="200px">
	<img src="images/remove.png" width="200px">

	<p>&#169; Western Mindanao State University Interns</p>
	<p>College of Computing Studies 2023</p>
	<br><br>
</div>
</fieldset><br><br>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>