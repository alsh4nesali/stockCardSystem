<?php 
    
    include('connection.php');
    $id = $_GET['id'];
    $query = "UPDATE tbl_stocks SET flag = '1' WHERE id = '$id'";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        header('location:dashboard.php');
    }
    else
    {
        echo "string";
    }

 ?>