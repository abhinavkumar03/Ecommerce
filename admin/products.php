
<?php
    include('../include/connect.php');
?>

<div class="container mt-2">
    <!-- <h1 class="text-center">Insert Product</h1> -->
    <h1 class="text-center"> Patient Information </h1>
    <!-- form  -->
    <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto">
        <!-- title -->
    <div class="w-90 mb-3 form-outline">
        <!-- <label for="products_title" class="form-label">Product Title</label> -->
        <label for="products_title" class="form-label"> Name </label>
        <input type="text" class="form-control" id="products_title" name="product_title" placeholder="Enter product title" autocomplete="off" required>
    </div>
        <!-- description -->
    <div class="w-90 mb-3 form-outline">
        <!-- <label for="products_des" class="form-label">Product Description</label> -->
        <label for="products_des" class="form-label"> Doctor's Feedback </label>
        <input type="text" class="form-control" id="products_des" name="product_des" placeholder="Enter product description" autocomplete="off" required>
    </div>
        <!-- keyword -->
    <div class="w-90 mb-3 form-outline">
        <!-- <label for="products_key" class="form-label">Product keyword</label> -->
        <label for="products_key" class="form-label">Main Keywords </label>
        <input type="text" class="form-control" id="products_key" name="product_key" placeholder="Enter product key" autocomplete="off" required>
    </div>
    
        <!-- categorie -->
    <div class="w-90 mb-3 form-outline">
        <select id="" class="form-select" name="product_brands">
            <!-- <option value="">select a brand</option> -->
            <option value="">select Department</option>
            <?php
                $select_brands = "SELECT * FROM brands";
                $result_query = mysqli_query($conn,$select_brands);
                while($row_data = mysqli_fetch_assoc($result_query)){
                    $brands_title = $row_data['brands_title'];
                    $brands_id = $row_data['brands_id'];
                    echo "<option value='$brands_id'> $brands_title </option>";
                }
            ?>
        </select>
    </div>

        <!-- brands -->
        <div class="w-90 mb-3 form-outline">
        <select id="" class="form-select" name="product_categories">
            <!-- <option value="">select a categorie</option> -->
            <option value=""> Select Problems </option>
            <?php
                $select_categories = "SELECT * FROM categories";
                $result_query = mysqli_query($conn,$select_categories);
                while($row_data = mysqli_fetch_assoc($result_query)){
                    $categories_title = $row_data['categories_title'];
                    $categories_id = $row_data['categories_id'];
                    echo "<option value='$categories_id'> $categories_title </option>";
                }
            ?>
        </select>
    </div>

        <!-- product image -->
    <div class="w-90 mb-3 form-outline">
        <!-- <label for="products_image1" class="form-label">Product Image 1</label> -->
        <label for="products_image1" class="form-label">Patitent Image </label>
        <input type="file" class="form-control" id="products_image1" name="product_image1" required>
    </div>
    <!-- <div class="w-90 mb-3 form-outline">
        <label for="products_image2" class="form-label">Product Image 2</label>
        <input type="file" class="form-control" id="products_image2" name="product_image2" required>
    </div>
    <div class="w-90 mb-3 form-outline">
        <label for="products_image3" class="form-label">Product Image 3</label>
        <input type="file" class="form-control" id="products_image3" name="product_image3" required>
    </div> -->

        <!-- price -->
    <div class="w-90 mb-3 form-outline">
        <!-- <label for="products_price" class="form-label">Product Price</label> -->
        <label for="products_price" class="form-label"> CheckUp Fees </label>
        <input type="text" class="form-control" id="products_price" name="product_price" placeholder="Enter the price" autocomplete="off" required>
    </div>

    <!-- <button type="submit" name="insert_product" class="btn btn-primary mt-2 mb-5 px-3"> Insert Product </button> -->
    <button type="submit" name="insert_product" class="btn btn-primary mt-2 mb-5 px-3"> Add Patient </button>   
    </form>
</div>

<?php
    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $product_des = $_POST['product_des'];
        $product_key = $_POST['product_key'];  
        $product_categories = $_POST['product_categories']; 
        $product_brands = $_POST['product_brands']; 
        $product_price = $_POST['product_price'];
        $product_status = 'true';
        
        // accessing image
        $product_image1 = $_FILES['product_image1']['name']; 
        // $product_image2 = $_FILES['product_image2']['name']; 
        // $product_image3 = $_FILES['product_image3']['name']; 
        
        //accessing tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name']; 
        // $temp_image2 = $_FILES['product_image2']['tmp_name']; 
        // $temp_image3 = $_FILES['product_image3']['tmp_name']; 

        //checking empty condition
        // if($product_title == '' or $product_des == '' or $product_key == '' or $product_categories == '' or $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == ''){
        //     echo "<script>alert('Please fill all the values')</script>";
        //     exit();
        // }
        if($product_title == '' or $product_des == '' or $product_key == '' or $product_categories == '' or $product_brands == '' or $product_price == '' or $product_image1 == ''){
            echo "<script>alert('Please fill all the values')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_img/$product_image1");
            // move_uploaded_file($temp_image2,"./product_img/$product_image2");
            // move_uploaded_file($temp_image3,"./product_img/$product_image3");

            

            //insert query
            // $insert_product = "INSERT INTO products (product_title,product_des,product_key,categories_id,brands_id,product_img1,product_img2,product_img3,product_price,date,status) VALUES ('$product_title','$product_des','$product_key','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
            // $result_query = mysqli_query($conn,$insert_product);
            $insert_product = "INSERT INTO products (product_title,product_des,product_key,categories_id,brands_id,product_img1,product_price,date,status) VALUES ('$product_title','$product_des','$product_key','$product_categories','$product_brands','$product_image1','$product_price',NOW(),'$product_status')";
            $result_query = mysqli_query($conn,$insert_product);
            
            if($result_query){
                echo "<script>alert('Product inserted successfully')</script>";
            }
        }
    }
?>



 
