<?php
    $order_id = $_GET['delete_order'];
    $delete_query = "DELETE FROM order_id WHERE order_id=$order_id ";
    $result_query = mysqli_query($conn,$delete_query);
    if($result_query){
        // echo "<script>alert('Categories deleted succesfully')</script>";
        echo "<script>window.open('./index.php?all_orders','_self')</script>";
    }
?>