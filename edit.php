<?php

if(isset($_POST['insertbill']))
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
    $reference = $_POST['reference'];
    $receipt_qty = $_POST['receipt_qty'];
    $issue_qty = $_POST['issue_qty'];
    $issue_office = $_POST['issue_office'];
    $balance_qty = $_POST['balance_qty'];
    $consume = $_POST['consume'];

    $query = "UPDATE tbl_stocks SET entity_name = '$entity' ,fund_cluster = '$cluster',item = '$item' ,descrip = '$descrip', unit_m = '$unit', stock_no = '$stock_no', re_order = '$re_order', date = '$date', reference = '$reference', receipt_qty = '$receipt_qty', issue_qty = '$issue_qty', issue_office ='$issue_office' , balance_qty = '$balance_qty', consume = '$consume' WHERE id='$id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
        {
        echo "<script>
        alert('User Data has been Updated!');
        window.location.href='../index.php';
        </script>";
        }
        else
        {
        echo "<script>
        alert('Data not Updated!');
        window.location.href='../index.php';
        </script>";
        }

}
?>