<?php
    include("./include/connect.php");

    // getting products  
    function getProducts(){
        global $conn;

        // condition to check isset or not
        if(!isset($_GET['categories'])){
            if(!isset($_GET['brands'])){
                $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,12";
                $result_query = mysqli_query($conn,$select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card' >
                    <img src='./admin/product_img/$product_img1' class='card-img-top view-img' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Fees : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'> Done </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'> Contact </a>
                        </div>
                        </div>
                    </div>";
                }
            }
        }
    }

    // getting all products
    function getAllProducts(){
        global $conn;

        // condition to check isset or not
        if(!isset($_GET['categories'])){
            if(!isset($_GET['brands'])){
                $select_query = "SELECT * FROM products ORDER BY rand()";
                $result_query = mysqli_query($conn,$select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                    <img src='./admin/product_img/$product_img1' class='card-img-top view-img' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'> Done </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'> Contact </a>
                        </div>
                        </div>
                    </div>";
                }
            }
        }
    }

    // getting unique categories
    function getUniqueCategories(){
        global $conn;
        if(isset($_GET['categories'])){
            $category_id = $_GET['categories'];
            $select_query = "SELECT * FROM products WHERE categories_id = $category_id";
            $result_query = mysqli_query($conn,$select_query);
            $rows = mysqli_num_rows($result_query);
            if($rows > 0){
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                    <img src='../admin/product_img/$product_img1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'> Done </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'> Contact </a>
                        </div>
                    </div>
                </div>";
                }
            }
            else{
                echo "<h2 class='text-center text-danger'>No Stock, for this Categories!!</h2>";
            }
        }

    }

    // getting unique brands
    function getUniqueBrands(){
        global $conn;
        if(isset($_GET['brands'])){
            $brand_id = $_GET['brands'];
            $select_query = "SELECT * FROM products WHERE brands_id = $brand_id";
            $result_query = mysqli_query($conn,$select_query);
            $rows = mysqli_num_rows($result_query);
            if($rows > 0){
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                    <img src='../admin/product_img/$product_img1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
                }
            }
            else{
                echo "<h2 class='text-center text-danger'>This Brand, is not available for service!!</h2>";
            }
        }

    }

    // gettiing brands *shown in sidenav
    function getBrands(){
        global $conn;
        $select_brands = "SELECT * FROM brands";
        $result_brands = mysqli_query($conn, $select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands)){
            $brands_title = $row_data['brands_title'];
            $brands_id = $row_data['brands_id'];
            echo "<li class='nav-item bg-secodary'>
                    <a href='index.php?brands=$brands_id' class='nav-link text-light'>$brands_title</a>
                    </li>";
        }
    }

    // getting categories *shown in sienav
    function getCategories(){
        global $conn;
        $select_categories = "SELECT * FROM categories";
        $result_query = mysqli_query($conn,$select_categories);
       
            while($row_data = mysqli_fetch_assoc($result_query)){
                $categories_title = $row_data['categories_title'];
                $categories_id = $row_data['categories_id'];
                echo "<li class='nav-item bg-secondary'><a href='index.php?categories=$categories_id' class='nav-link text-light'>$categories_title</a>
                </li>";
            }
    }

    // searching product function
    function searchProduct(){
        global $conn;
        if(isset($_GET['search_data_product'])){
            $search_data_value = $_GET['search_data'];
            $search_query = "SELECT * FROM products WHERE product_key LIKE '%$search_data_value%'";
            $result_query = mysqli_query($conn,$search_query);
            $num = mysqli_num_rows($result_query);
            if($num > 0){
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                    <img src='./admin/product_img/$product_img1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'> Done </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'> Contact </a>
                        </div>
                        </div>
                    </div>";
                }
            }
            else{
                echo "<h2 class='text-center text-danger'> No Match result found! </h2>";
            }
        }
    }

    // getting product details
    function getProductDetails(){
        global $conn;

        // condition to check isset or not
        if(isset($_GET['product_id'])){
        if(!isset($_GET['categories'])){
            if(!isset($_GET['brands'])){
                $product_id = $_GET['product_id'];
                $select_query = "SELECT * FROM products WHERE product_id = $product_id";
                $result_query = mysqli_query($conn,$select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_title = $row['product_title'];
                    $product_des = $row['product_des'];
                    $categories_id = $row['categories_id'];
                    $brands_id = $row['brands_id'];
                    $product_img1 = $row['product_img1'];
                    // $product_img2 = $row['product_img2'];
                    // $product_img3 = $row['product_img3'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-3 mt-3'>
                    <div class='card'>
                    <img src='./admin/product_img/$product_img1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_des</p>
                            <p class='card-text'>Price : $product_price/-</p>
                            <a href='index.php?addToCart=$product_id' class='btn btn-info'> Done </a>
                            <a href='index.php' class='btn btn-secondary'>Go To Patient List </a>
                        </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-warning mb-5'>Related Products</h4>

                            </div>

                            <div class='col-md-4'>
                            Patients Detils 
                            </div>
                            <div class='col-md-4'>
                            Date Of Birth
                            </div>
                            <div class='col-md-4'>
                            Contact Number
                                
                            </div>
                        </div>
                    </div>";
                }
            }
        }
        }
    }

    // get ip address 
    function getIPAddress(){
        // $variableIndex = array(
        //     "HTTP_CLIENT_IP",
        //     "HTTP_X_FORWARDED_FOR",
        //     "HTTP_X_FORWARDED",
        //     "HTTP_FORWARDED_FOR",
        //     "HTTP_FORWARDED",
        //     "REMOTE_ADDR"
        // );
        // for ($i = 0; $i < count($variableIndex); $i ++) {
        //     if (! isset($ipAddress)) {
        //         if (array_key_exists($variableIndex[$i], $_ENV)) {
        //             $ipAddress = $_SERVER[$variableIndex[$i]];
        //             echo $ipAddress;
        //             break;
        //         }
        //     }
        // }
        return $_SERVER['REMOTE_ADDR'];
    }
    // cart function
    function cart(){
        if(isset($_GET['addToCart'])){
            global $conn;

            $ip = $_SERVER['REMOTE_ADDR'];
            $getProductId = $_GET['addToCart'];
            $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id='$getProductId'";
            $result_query = mysqli_query($conn,$select_query);
            $rows = mysqli_num_rows($result_query);
            if($rows > 0){
                echo "<script> alert('This data is already present in the cart')</script>";
                echo "<script> window.open('index.php','_self')</script>";
            }
            else{
                $insert_query = "INSERT INTO cart_details(product_id,ip_address,quantity) VALUE($getProductId,'$ip',0)";
                $result_query = mysqli_query($conn,$insert_query);
                // echo "<script> alert('This item is added to the cart')</script>";
                echo "<script> window.open('index.php','_self')</script>";
            }
        }
    }

    // function to get cart number
    function cart_item(){
        global $conn;

        $ip = $_SERVER['REMOTE_ADDR'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result_query = mysqli_query($conn,$select_query);
        $cart_items = mysqli_num_rows($result_query);
        echo $cart_items;
    }  

    // total cart price
    function total_price(){
        global $conn;

        $total_price = 0;
        $ip = $_SERVER['REMOTE_ADDR'];
        $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result_query = mysqli_query($conn,$cart_query);
        while($row = mysqli_fetch_array($result_query)){
            $product_id = $row['product_id'];
            $product_query = "SELECT * FROM products WHERE product_id = $product_id";
            $product_result = mysqli_query($conn,$product_query);
            while($product_row = mysqli_fetch_array($product_result)){
                $product_price = array($product_row['product_price']);
                $product_value = array_sum($product_price);
                $total_price += $product_value;
                // $product_price = $product_row['product_price'];
                // $total_price += $product_price;
            }
        }
        echo $total_price;
    }
    
    // function to remove item
    function remove_cart_item(){
        global $conn;

        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query = "DELETE * FROM 'cart_details' WHERE product_id=$remove_id";
                $run_delete = mysqli_query($conn,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    
    //<img src='./admin/product_img/' class='card-img-top' alt='$product_title'>
?>