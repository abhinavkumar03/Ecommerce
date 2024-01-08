
<!-- <h2 class="text-center my-3"> Insert Brands </h2> -->
<h2 class="text-center my-3"> Insert Department </h2>
<form action="" method="post" class="mb-3 my-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <!-- <input type="text" class="form-control" aria-label="Brands" placeholder="Insert Brands" name="brand_title" aria-describedby="basic-addon1"> -->
        <input type="text" class="form-control" aria-label="Brands" placeholder="Insert Department" name="brand_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <button type="submit" class="bg-info text-light px-3 py-1 btn-ra border-0 my-2" name="insert_brand">Insert Brands</button> -->
        <button type="submit" class="bg-info text-light px-3 py-1 btn-ra border-0 my-2" name="insert_brand">Insert Department</button>
    </div>
</form>

<?php
    include("../include/connect.php");
    if(isset($_POST['insert_brand'])){
        $brands_title = $_POST['brand_title'];
        $select_query = "SELECT * FROM brands WHERE brands_title='$brands_title'";
        $result_select = mysqli_query($conn,$select_query);
        $rows = mysqli_num_rows($result_select);
        if($rows == 0){
            $insert_query = "INSERT INTO brands(brands_title) VALUES('$brands_title')";
            $result = mysqli_query($conn,$insert_query);
            echo "<script> alert('successfully added brands'); </script>";
        }
        else{
            echo "<script> alert('This brand already available!'); </script>";
        }
    }
?>