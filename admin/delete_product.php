<?php
    $product_id = $_GET['delete_product'];
    $delete_query = "DELETE FROM products WHERE product_id=$product_id ";
    $result_query = mysqli_query($conn,$delete_query);
    if($result_query){
        // echo "<script>alert('Product deleted succesfully')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
    }
?>