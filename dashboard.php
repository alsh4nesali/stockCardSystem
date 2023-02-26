<?php

include('connection.php');

if(isset($_POST['editinfo']))
{

    $id = $_POST['id'];

    $entity = $_POST['entity'];
    $cluster = $_POST['cluster'];
    $descrip = $_POST['descrip'];
    $item = $_POST['item'];
    $unit = $_POST['unit'];
    $stock_no = $_POST['stock_no'];
    $re_order = $_POST['re_order'];
    $date = $_POST['date'];

    $query = "UPDATE tbl_stocks SET entity_name = '$entity' ,fund_cluster = '$cluster',item = '$item' ,descrip = '$descrip', unit_m = '$unit', stock_no = '$stock_no', re_order = '$re_order', date = '$date' WHERE id='$id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
        {
        $var = 'Information has been saved!';
        $message = 'Stock card information has been changed...';

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { swal('$var','$message','success')";
            echo '}, 1000);</script>';
        }
        else
        {
        $var = 'Error!';
        $message = 'Error occured while editing the information please try again after a few second...';

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { swal('$var','$message','error')";
            echo '}, 1000);</script>';
        }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPMS Stock Card Information</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="js/sweetalert.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #BDCDD6 !important;
        }



        label{
            padding-bottom: 0.5%;
            font-weight: 800;
        }


        .table td{

            font-weight: bold;
        }

    </style>

</head>

<body>


<nav class="navbar navbar-expand-lg p-3" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php"><img src="images/dpwh.svg" width="80px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent fw-bold">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Add Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="files.php">Previous Files</a>
        </li>
      </ul>
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>

                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="">
                                <table class="table table-bordered p-3" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                    <th style="display: none;"></th>
                                    <th>Date</th>
                                    <th>Entity Name</th>  
                                    <th>Fund Cluster</th>
                                    <th>Item</th>  
                                    <th>Description</th>  
                                     <th>Unit of Measurement</th> 
                                     <th>Stock No.</th>
                                     <th>Re-order Point</th>
                                     <th>PRINT</th>
                                     <th>EDIT</th>
                                     <th>DELETE</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php
include 'connection.php';

$result = mysqli_query($connection,"SELECT * FROM tbl_stocks WHERE flag =  '0' ORDER BY id DESC");

if($result != null){
while($row = mysqli_fetch_array($result))
  {
                    echo "<tr>";

                    echo '
                    <td style="display:none;">'.$row["id"].'</td>
                    <td>'.$row["date"].'</td>
                    <td>'.$row["entity_name"].'</td>
                    <td>'.$row["fund_cluster"].'</td>
                    <td>'.$row["item"].'</td>
                    <td>'.$row["descrip"].'</td>
                    <td>'.$row["unit_m"].'</td>
                    <td>'.$row["stock_no"].'</td>
                    <td>'.$row["re_order"].'</td>';


                 echo"   <td>
                    <a rel='facebox' target='_blank' href='printing.php?id=".$row['id']."'>
                    <button type='button' class='btn btn-warning genbtn fw-bold'> <i class='fa fa-print' style='font-size:30px' alt='PRINT'></i> </button></a>
                </td>";

                echo'    <td>
                    <a href="" data-id="'.$row['id'].'"  class="btn btn-secondary editbtn fw-bold"  data-bs-toggle="modal"
                data-bs-target="#editModal"><i class="fa fa-edit" style="font-size:30px" ></i></a>
                </td>';

                echo'    <td>
                    <a href="" data-id="'.$row['id'].'"  class="btn btn-danger trash fw-bold"  data-bs-toggle="modal"
                data-bs-target="#logoutModal"> <i class="fa fa-remove trash" style="font-size:30px" ></i></a>
                </td>';
                


                echo "</tr>";
  }
}else{
    echo "No Records Found";
}

?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<br><br><br><br>

<div class="img">
	<img src="images/wmsu.png" width="200px">
	<img src="images/remove.png" width="200px">
	<img src="images/dpwh.svg" width="200px">
	<p>&#169; Western Mindanao State University Interns</p>
	<p>College of Computing Studies 2023</p>
	<br><br>
</div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog fw-bold" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Are you sure you want to delete this data?</h5>
                </div>
                <div class="modal-body">Select "YES" below if you want to delete stock card information.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary fw-bold" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger fw-bold" href="" id="modalDelete">YES</a>
                </div>
            </div>
        </div>
    </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xl-down fw-bold" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Stock Card Information</h5>
                </div>

                <form action="dashboard.php" method="POST">
                    <div class="modal-body ">

                        <div class="form-group">

                            <input type="hidden" name="id" id="id" value="id" readonly="readonly"  class="form-control "
                                >
                        </div>
                       
                        <div class="form-group">
                            <label> Date </label>
                            <input name="date" id="date" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Entity Name </label>
                            <input name="entity" id="entity_name" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Fund Cluster </label>
                            <input name="cluster" id="fund_cluster" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Item </label>
                            <input name="item" id="item" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input name="descrip" id="descrip" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Unit of Measurement </label>
                            <input name="unit" id="unit_m" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Stock No. </label>
                            <input name="stock_no" id="stock_no" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                        <div class="form-group">
                            <label> Re-order Point. </label>
                            <input name="re_order" id="re_order" value="firstName"   class="form-control fw-bold"
                                >
                        </div>

                    <div class="modal-footer fw-bold">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editinfo" class="btn btn-primary">Save Information</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

          <script>
        $('.trash').click(function(){
            var id=$(this).data('id');
            $('#modalDelete').attr('href','del.php?id='+id);
        })
    </script>


            <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#date').val(data[1]);
                $('#entity_name').val(data[2]);
                $('#fund_cluster').val(data[3]);
                $('#item').val(data[4]);
                $('#descrip').val(data[5]);
                $('#unit_m').val(data[6]);
                $('#stock_no').val(data[7]);
                $('#re_order').val(data[8]);

            });
        });
    </script>

    <script >
            $(document).ready( function () {
        $('#dataTable').DataTable();
    } );


        $('#dataTable').dataTable( {
          "lengthChange": false,
          "pageLength": 6,
           language: { search: "____Stock Card Search____" },
        });
    </script>

</body>


</html>