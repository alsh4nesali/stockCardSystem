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

    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #BDCDD6 !important;
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
        <th>Date</th>
        <th>Entity Name</th>
        <th>Reference/PAR No.</th>
        <th>Receipt/Qty</th>
        <th>Qty</th>
        <th>Issue/Transfer/Disposal<br>Office/Officer</th>
        <th>Balance</th>
        <th>Amount</th>
        <th>Remarks</th>
        <th></th>
        <th></th>
        <th></th>

        <th style="display: none;"></th>

                                        </tr>
                                    </thead>

                                    <tbody>
    <?php
include 'connection.php';

$result = mysqli_query($connection,"SELECT * FROM tbl_cards WHERE flag = 1 ORDER BY id DESC");

if($result != null){
while($row = mysqli_fetch_array($result))
  {
                    echo "<tr>";

                    echo '
                    <td style="display:none;">'.$row["id"].'</td>
                    <td>'.$row["date"].'</td>
                    <td>'.$row["entity_name"].'</td>
                    <td>'.$row["referencenum"].'</td>
                    <td>'.$row["receipt"].'</td>
                    <td>'.$row["qty"].'</td>
                    <td>'.$row["itd"].'</td>
                    <td>'.$row["balance"].'</td>
                    <td>'.$row["amount"].'</td>
                    <td>'.$row["remarks"].'</td>';


                 echo"   <td>
                    <a rel='facebox' target='_blank' href='printing.php?id=".$row['id']."'>
                    <button type='button' class='btn btn-warning genbtn fw-bold'> <i class='fa fa-print' style='font-size:30px' alt='PRINT'></i> </button></a>
                </td>";

                 echo"   <td>
                    <a rel='facebox' target='_blank' href='view.php?id=".$row['id']."'>
                    <button type='button' class='btn btn-secondary editbtn fw-bold'><i class='fa fa-info-circle' style='font-size:30px'></i></button></a>
                </td>";


                 echo"   <td>
                    <a rel='facebox' href='restore.php?id=".$row['id']."'>
                    <button type='button' class='btn btn-success editbtn fw-bold'><i class='fa fa-window-restore' style='font-size:30px'></i></button></a>
                </td>";
                


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

          <script>
        $('.trash').click(function(){
            var id=$(this).data('id');
            $('#modalDelete').attr('href','del.php?id='+id);
        })
    </script>

        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
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