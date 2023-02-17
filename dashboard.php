<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPMS Stock Card Information</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary p-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php"><img src="images/dpwh.svg" width="80px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent fw-bold">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Add Data</a>
        </li>

      </ul>
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>


                              <table class="table table-bordered text-center fw-bold" width="100%" cellspacing="0" style="color: black;">
                                    <thead class="">
                               <tr>  
                                    <th>Date</th>
                                    <th>Entity Name</th>  
                                    <th>Fund Cluster</th>
                                    <th>Item</th>  
                                    <th>Description</th>  
                                     <th>Unit of Measurement</th> 
                                     <th>Stock No.</th>
                                     <th>Re-order Point</th>
                                     <th>PRINT</th>
                                     <th>REMOVE</th>
                               </tr>  
                                    </thead>
    <?php
include 'connection.php';

$result = mysqli_query($connection,"SELECT * FROM tbl_stocks ");


while($row = mysqli_fetch_array($result))
  {
                    echo "<tr>";

                    echo '
                    <td>'.$row["date"].'</td>
                    <td>'.$row["entity_name"].'</td>
                    <td>'.$row["fund_cluster"].'</td>
                    <td>'.$row["item"].'</td>
                    <td>'.$row["descrip"].'</td>
                    <td>'.$row["unit_m"].'</td>
                    <td>'.$row["stock_no"].'</td>
                    <td>'.$row["re_order"].'</td>';


                 echo"   <td>
                    <a rel='facebox' href='printing.php?id=".$row['id']."'>
                    <button type='button' class='btn btn-warning genbtn fw-bold'> <i class='fa fa-print' style='font-size:36px' alt='PRINT'></i> </button></a>
                </td>";

                echo'    <td>
                    <button type="button" class="btn btn-danger genbtn fw-bold"  data-toggle="modal"
                data-target="#billmodal"> <i class="fa fa-remove" style="font-size:36px"></i></button>
                </td>';
                


                echo "</tr>";
  }


?>
                                      
                                    </tbody>
                                </table>

<br><br><br><br><br><br>

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