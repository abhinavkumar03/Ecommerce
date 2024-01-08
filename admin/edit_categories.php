<?php
if(isset($_GET['edit_categories'])){
    $categories_id = $_GET['edit_categories'];
    $select_categories = "SELECT * FROM categories WHERE categories_id = $categories_id";
    $result_categories = mysqli_query($conn,$select_categories);
    $categories_details = mysqli_fetch_assoc($result_categories);
    $categories_title = $categories_details['categories_title'];

    if(isset($_POST['update_categories'])){
        $categories_title = $_POST['categories_title'];
        $update_categories = "UPDATE categories SET categories_title='$categories_title' WHERE categories_id=$categories_id";

        $result_update = mysqli_query($conn,$update_categories);
        if($result_update){
            echo "<script>alert('Categories updated succesfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }


    }
}



?>
<div class="container ">
    <!-- <h3 class="text-center text-success">Edit Categories</h3> -->
    <h3 class="text-center text-success">Edit Sympotomes </h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto">
                <!-- products title field -->
                <!-- <label for="categories_title" class="form-label mt-5">Categories title</label> -->
                <label for="categories_title" class="form-label mt-5"> HOSPITAL NAME </label>
                <input type="text" id="categories_title" class="form-control" placeholder="" value="<?php echo $categories_title; ?>" autocomplete="off" required name="categories_title">
            </div>
            <div class="form-outline d-flex justify-content-center">
                <!-- <input type="submit" value="Update categories" class="btn btn-info my-3 mb-5 py-2 px-3 border-0 mb-2" name="update_categories"> -->
                <input type="submit" value="Update Sympotomes" class="btn btn-info my-3 mb-5 py-2 px-3 border-0 mb-2" name="update_categories">
            </div>

        </form>
</div>