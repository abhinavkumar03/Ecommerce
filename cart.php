<!-- connect file -->
<?php
    include("include/connect.php");
    include("function/common_function.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traps In Boot </title>
    <link rel="shortcut icon" href="img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- index css file -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TRAPSINBOOT</a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <!-- <a class="nav-link" href="displayAll.php">Products</a> -->
                <a class="nav-link" href="displayAll.php">Patients</a>
                </li>
                <?php
                    if(isset($_SESSION['username'])){
                      echo "<li class='nav-item'>
                      <a class='nav-link' href='./user/profile.php'>My account</a>
                      </li>";  
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./user/user_registration.php'>Register</a>
                        </li>";
                    }
                ?>
                <li class="nav-item">
                <a class="nav-link" href="/">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <!-- calling cart function -->
        <?php
            cart();
        ?>

        <!-- second child -->
        <div class="nav navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='/'>Welcome Guest</a>
                    </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='/'>Welcome ".$_SESSION['username']."</a>
                    </li>";
                    }
                ?>
                <?php  
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./user/user_login.php'>Login <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./user/user_logout.php'>Logout <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                ?>
            </ul>
        </div>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Cart dashboard</h3>
            <p class="text-center"> Open to all to take refreshment, Food and beverage.</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>product_title</th>
                            <th>product_image</th>
                            <th>quantity</th>
                            <th>total_price</th>
                            <th>remove</th>
                            <th colspan="2">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code for display cart data -->

                        <?php
                            $total_price = 0;
                            $ip = getIPAddress();
                            $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
                            $result_query = mysqli_query($conn,$cart_query);
                            while($row = mysqli_fetch_array($result_query)){
                                $product_id = $row['product_id'];
                                $product_query = "SELECT * FROM products WHERE product_id = $product_id";
                                $product_result = mysqli_query($conn,$product_query);
                                while($product_row = mysqli_fetch_array($product_result)){
                                    $product_price_arr = array($product_row['product_price']);
                                    $product_value = array_sum($product_price_arr);
                                    $total_price += $product_value;
                                    $product_price = $product_row['product_price'];
                                    $product_title = $product_row['product_title'];
                                    $product_img1 = $product_row['product_img1'];
                                    $product_id = $product_row['product_id'];
                                    // $total_price += $product_price;
                        ?>

                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./admin/product_img/<?php echo $product_img1; ?>" alt="" class="cart_img"></td>
                            <td><input type="text" name='qty'  class="form-input w-50"></td>
                            <?php
                                $ip = getIPAddress();
                                if(isset($_POST['update_cart'])){
                                    $quantity = $_POST['qty'];
                                    $update_cart_quantity = "UPDATE cart_details SET quantity='$quantity' WHERE ip_address='$ip' AND product_id=$product_id" ;
                                    $result_quantity = mysqli_query($conn,$update_cart_quantity);

                                    $total_price += (int)$product_value*(int)$quantity;
                                    
                                }
                            ?> 
                            <td><?php echo $product_price ?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>" id=""></td>
                            <td>
                                <button type="submit" class="px-3 mr-3 py-2 border-0 bg-primary text-light" name="update_cart">Update</button>
                                <input type="submit" name="remove_cart" class="px-3 py-2 border-0 bg-primary text-light"value='Remove'>
                            </td>
                        </tr>

                        <?php 
                            }}
                        ?>
                    </tbody>
                    
                </table>
                 
                <div class="d-flex mb-5">
                    <h4 class="px-3 ">Sub Total : <?php echo $total_price; ?></h4>
                    <button class="" ><a href="index.php" class="px-3 py-2 border-0 bg-primary text-light text-decoration-none">Continue Shopping</a></button>
                    <button class="mx-2"><a href="checkout.php" class="text-decoration-none px-3 py-2 border-0 bg-primary text-light">Checkout</a></button>
                </div>
                </form>
            </div>
        </div>





        <!-- last child -->
        <div class="bg-dark text-light p-3 text-center " style="margin-top:25vh">
            <p>All rights reserved &copy; - Designed by Abhinav-2023</p>
        </div>
    </div>
    <!-- bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>