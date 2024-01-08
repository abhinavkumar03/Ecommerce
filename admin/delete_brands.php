<?php
    $brands_id = $_GET['delete_brands'];
    $delete_query = "DELETE FROM brands WHERE brands_id=$brands_id ";
    $result_query = mysqli_query($conn,$delete_query);
    if($result_query){
        // echo "<script>alert('Brands deleted succesfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
?>