<?php
    $payment_id = $_GET['delete_payment'];
    $delete_query = "DELETE FROM user_paymnet WHERE payment_id=$payment_id ";
    $result_query = mysqli_query($conn,$delete_query);
    if($result_query){
        // echo "<script>alert('Categories deleted succesfully')</script>";
        echo "<script>window.open('./index.php?all_payment','_self')</script>";
    }
?>