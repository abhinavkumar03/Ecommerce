<?php
if(isset($_GET['edit_brands'])){
    $brands_id = $_GET['edit_brands'];
    $select_brands = "SELECT * FROM brands WHERE brands_id = $brands_id";
    $result_brands = mysqli_query($conn,$select_brands);
    $brands_details = mysqli_fetch_assoc($result_brands);
    $brands_title = $brands_details['brands_title'];

    if(isset($_POST['update_brands'])){
        $brands_title = $_POST['brands_title'];
        $update_brands = "UPDATE brands SET brands_title='$brands_title' WHERE brands_id=$brands_id";

        $result_update = mysqli_query($conn,$update_brands);
        if($result_update){
            // echo "<script>alert('brands updated succesfully')</script>";
            echo "<script>alert('Department updated succesfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }


    }
}



?>
<div class="container ">
    <!-- <h3 class="text-center text-success">Edit Brands</h3> -->
    <h3 class="text-center text-success"> DEPARTMENT </h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto">
                <!-- products title field -->
                <!-- <label for="brands_title" class="form-label mt-5">Brand title</label> -->
                <label for="brands_title" class="form-label mt-5"> Department Name </label>
                <input type="text" id="brands_title" class="form-control" placeholder="" value="<?php echo $brands_title; ?>" autocomplete="off" required name="brands_title">
            </div>
            <div class="form-outline d-flex justify-content-center">
                <!-- <input type="submit" value="Update brands" class="btn btn-info my-3 mb-5 py-2 px-3 border-0 mb-2" name="update_brands"> -->
                <input type="submit" value="Update Department" class="btn btn-info my-3 mb-5 py-2 px-3 border-0 mb-2" name="update_brands">
            </div>

        </form>
</div>