<?php
if(isset($_GET['edit_product'])){
    $product_id = $_GET['edit_product'];
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $result_product = mysqli_query($conn,$select_product);
    $product_details = mysqli_fetch_assoc($result_product);
    $product_title = $product_details['product_title'];
    $product_dec = $product_details['product_des'];
    $product_key = $product_details['product_key'];
    $product_title = $product_details['product_title'];
    $category_id = $product_details['categories_id'];
    $brand_id = $product_details['brands_id'];
    $product_img1 = $product_details['product_img1'];
    $product_img2 = $product_details['product_img2'];
    $product_img3 = $product_details['product_img3'];
    $product_price = $product_details['product_price'];

    // fetching categories
    $select_category = "SELECT * FROM categories WHERE categories_id = $category_id";
    $result_category = mysqli_query($conn,$select_category);
    $category_data = mysqli_fetch_assoc($result_category);
    $category_title = $category_data['categories_title'];

    $select_brand = "SELECT * FROM brands WHERE brands_id = $brand_id";
    $result_brand = mysqli_query($conn,$select_brand);
    $brand_data = mysqli_fetch_assoc($result_brand);
    $brand_title = $brand_data['brands_title'];

    if(isset($_POST['edit_product'])){
        $product_dec = $_POST['product_dec'];
        $product_key = $_POST['product_key'];
        $product_title = $_POST['product_title'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        
        $temp_product_img1 = $_FILES['product_img1']['tmp_name'];
        $temp_product_img2 = $_FILES['product_img2']['tmp_name'];
        $temp_product_img3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_product_img1,"./product_img/$product_img1");   
        move_uploaded_file($temp_product_img2,"./product_img/$product_img2");   
        move_uploaded_file($temp_product_img3,"./product_img/$product_img3");   

        // $update_product = " UPDATE 'products' SET product_title='$product_title', product_des='$product_dec', product_key='$product_key', categories_id='$category_id', brands_id='$brand_id',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price'";

        $update_product = "UPDATE products SET product_title='$product_title', product_des='$product_dec', product_key='$product_key', categories_id='$category_id', brands_id='$brand_id', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', 	product_price='$product_price', date=NOW() WHERE product_id=$product_id ";

        $result_update = mysqli_query($conn,$update_product);
        if($result_update){
            echo "<script>alert('Product updated succesfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }


    }
}



?>
<div class="container ">
    <!-- <h3 class="text-center text-success">Edit Products</h3> -->
    <h3 class="text-center text-success">Edit Patients Details</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto">
                <!-- products title field -->
                <label for="product_title" class="form-label mt-5">Product title</label>
                <input type="text" id="product_title" class="form-control" placeholder="" value="<?php echo $product_title; ?>" autocomplete="off" required name="product_title">
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- products description field -->
                <label for="product_dec" class="form-label mt-1">Product description</label>
                <input type="text" id="product_dec" class="form-control" placeholder="" value="<?php echo $product_dec; ?>" autocomplete="off" required name="product_dec">
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- products keyword field -->
                <label for="product_key" class="form-label mt-1">Product keyword</label>
                <input type="text" id="product_key" class="form-control" placeholder="" value="<?php echo $product_key; ?>" autocomplete="off" required name="product_key">
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- select category -->
                <label for="category_id" class="form-label mt-1">Product categories</label>
                <select name="category_id" class="form-select mb-1">
                    <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                    <?php
                        $select_category_all = "SELECT * FROM categories";
                        $result_category_all = mysqli_query($conn,$select_category_all);
                        while($category_data_all = mysqli_fetch_assoc($result_category_all)){
                            $category_id_all = $category_data_all['categories_id'];
                            $category_title_all = $category_data_all['categories_title'];
                            echo "<option value='$category_id_all'>$category_title_all</option>";
                        }

                    ?>

                </select>
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- select brand -->
                <label for="brand_id" class="form-label mt-1">Product brand</label>
                <select name="brand_id" class="form-select mb-3">
                    <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                    <?php
                        $select_brand_all = "SELECT * FROM brands";
                        $result_brand_all = mysqli_query($conn,$select_brand_all);
                        while($brand_data_all = mysqli_fetch_assoc($result_brand_all)){
                            $brand_id_all = $brand_data_all['brands_id'];
                            $brand_title_all = $brand_data_all['brands_title'];
                            echo "<option value='$brand_id_all'>$brand_title_all</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- user image -->
                <div class="d-flex align-items-center ">
                    <div class="w-100">
                    <label for="product_img1" class="form-label">Product image1</label>
                    <input type="file" id="product_img1" class="form-control mb-2" autocomplete="off" required name="product_img1">
                    </div>
                <img style="width: 20%;" class="mb-2" src="./product_img/<?php echo $product_img1; ?>" alt="">
                </div>
                <div class="d-flex align-items-center ">
                    <div class="w-100">
                    <label for="product_img2" class="form-label">Product image2</label>
                    <input type="file" id="product_img2" class="form-control mb-2" autocomplete="off" required name="product_img2">
                    </div>
                <img style="width: 20%;" class="mb-2" src="./product_img/<?php echo $product_img2; ?>" alt="">
                </div>
                <div class="d-flex align-items-center ">
                    <div class="w-100">
                    <label for="product_img3" class="form-label">Product image3</label>
                    <input type="file" id="product_img3" class="form-control mb-2" autocomplete="off" required name="product_img3">
                    </div>
                <img style="width: 20%;" class="mb-2" src="./product_img/<?php echo $product_img3; ?>" alt="">
                </div>
            </div>
            <div class="form-outline w-50 m-auto">
                <!-- products price field -->
                <label for="product_price" class="form-label mt-1">Product price</label>
                <input type="text" id="product_price" class="form-control" placeholder="" value="<?php echo $product_price; ?>" autocomplete="off" required name="product_price">
            </div>
            <div class="form-outline d-flex justify-content-center">
                <input type="submit" value="Update product" class="btn btn-info my-3 mb-5 py-2 px-3 border-0 mb-2" name="edit_product">
            </div>

        </form>
</div>