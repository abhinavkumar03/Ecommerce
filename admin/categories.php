
<!-- <h2 class="text-center my-3"> Insert Categories </h2> -->
<h2 class="text-center my-3"> Enter Symptoms </h2>
<form action="" method="post" class="mb-3 my-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <!-- <input type="text" class="form-control" aria-label="Categories" placeholder="Insert Categories" name="cat_title" aria-describedby="basic-addon1"> -->
        <input type="text" class="form-control" aria-label="Categories" placeholder="Enter Symptoms" name="cat_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <button type="submit" class="bg-info text-light px-3 py-1 btn-ra border-0 my-2" name="insert_cat">Insert Categories</button> -->
        <button type="submit" class="bg-info text-light px-3 py-1 btn-ra border-0 my-2" name="insert_cat"> Add Symptoms</button>
    </div>
</form>

<?php
    include("../include/connect.php");
    if(isset($_POST["insert_cat"])){
        $categories_title = $_POST['cat_title'];
        // select data from database
        $select_query = "SELECT * FROM categories WHERE categories_title='$categories_title'";
        $result_select = mysqli_query($conn, $select_query);
        $rows = mysqli_num_rows($result_select);
        if($rows == 0){
            $insert_query = "INSERT into categories (categories_title) VALUES ('$categories_title')";
            $result = mysqli_query($conn, $insert_query);
            // echo "<script> alert('successfully added categories'); </script>";
            echo "<script> alert('successfully added symptoms'); </script>";
        }
        else{
            echo "<script> alert('This categorie already available!'); </script>";
        }

        
    }
?>