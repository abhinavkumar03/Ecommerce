<?php
    $categories_id = $_GET['delete_categories'];
    $delete_query = "DELETE FROM categories WHERE categories_id=$categories_id ";
    $result_query = mysqli_query($conn,$delete_query);
    if($result_query){
        // echo "<script>alert('Categories deleted succesfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
?>