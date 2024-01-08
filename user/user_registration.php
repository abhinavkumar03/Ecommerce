<!-- connect file -->
<?php
    include("../include/connect.php");
    session_start();
    // include("../function/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traps In Boot : Checkout</title>
    <link rel="shortcut icon" href="img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../displayAll.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/">Contact</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <!-- second child -->
        <div class="nav navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Welcome Guest</a>
                </li>
                <?php  
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='user_login.php'>Login <i class='fa fa-sign-in' aria-hidden='true'></i></a>
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

        <div class="container">
            <h1 class="text-center">New User Registration</h1>
            <div class="row d-flex justify-content-center" >
                <div class="col-lg-10 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline">
                            <!-- username field -->
                            <label for="username" class="form-label mt-5">Username</label>
                            <input type="text" id="username" class="form-control mb-2 mt-2" placeholder="Enter your username" autocomplete="off" required name="username">
                        </div>
                        <div class="form-outline">
                            <!-- email field -->
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control mb-2" placeholder="Enter your email" autocomplete="off" required name="user_email">
                        </div>
                        <div class="form-outline">
                            <!-- user image -->
                            <label for="user_img" class="form-label">Username Image</label>
                            <input type="file" id="user_img" class="form-control mb-2" placeholder="Upload your image" autocomplete="off" required name="user_img">
                        </div>
                        <div class="form-outline">
                            <!-- password field -->
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control mb-2" placeholder="Enter your password" autocomplete="off" required name="user_password">
                        </div>
                        <div class="form-outline">
                            <!-- user address field -->
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control mb-2" placeholder="Enter your address" autocomplete="off" required name="user_address">
                        </div>
                        <div class="form-outline">
                            <!-- user contact field -->
                            <label for="user_mobile" class="form-label">Contact</label>
                            <input type="text" id="user_mobie" class="form-control mb-2" placeholder="Enter your contact number" autocomplete="off" required name="user_mobile">
                        </div>
                        <div class="mb-2 mt-3">
                            <input type="submit" value="register" class="bg-primary py-2 px-3 border-0 mb-2" name="user_register">
                            <p class="small font-weight-bold mb-">ALready have a account? <a href="user_login.php" class="text-info"> Login</a></p>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        



        <!-- last child -->
        <div class="bg-secondary p-3 text-center">
            <p>All rights reserved &copy; - Designed by Abhinav-2023</p>
        </div>
    </div>
    <!-- bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php



    
    if(isset($_POST['user_register'])){
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $ip = $_SERVER['REMOTE_ADDR'];    
        
        // password hash
        $user_password_hash = password_hash($user_password,PASSWORD_DEFAULT);

        // accessing img
        $user_img = $_FILES['user_img']['name']; 

        // accessing temp img
        $temp_user_img = $_FILES['user_img']['tmp_name'];
        move_uploaded_file($temp_user_img ,"./user_img/$user_img");

        // select query
        $select_query = "SELECT * FROM user_table WHERE username='$username' or user_email='$user_email'";
        $select_result = mysqli_query($conn,$select_query);
        $rows = mysqli_num_rows($select_result);
        
        if($rows == 0){
            // insert query
            $insert_query = "INSERT INTO user_table (username,user_email,user_password,user_img,user_ip,user_address,user_mobile) VALUES('$username','$user_email','$user_password_hash','$user_img','$ip','$user_address',$user_mobile)";
            $result_query = mysqli_query($conn,$insert_query);
            if($result_query){
                echo "<script>alert('Data inserted succcessfully');</script>";
            }
        }
        else{
            echo "<script>alert('Already registered');</script>";
        }

        // selecting cart item
        $select_cart_item = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result_cart = mysqli_query($conn,$select_cart_item);
        $num = mysqli_num_rows($result_cart);
        if($num > 0){
            $_SESSION['username']= $username;
            echo "<script>alert('You have item into your cart!');</script>";
            echo "<script>window.open('../checkout.php','_SELF')</script>";
        }
        else{
            echo "<script>window.open('../index.php','_SELF')</script>";
        }
    }



?>