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
    <title>Traps In Boot : Checkout</title>
    <link rel="shortcut icon" href="img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- access user id -->
    <?php 
        $username = $_SESSION['username'];
        // $user_id = $_SESSION['user_id'];
        $get_user = "SELECT * FROM user_table WHERE username='$username'";
        $result = mysqli_query($conn,$get_user);
        $get_user_data = mysqli_fetch_assoc($result);
        $user_id = $get_user_data['user_id'];
    ?>


    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TRAPSINBOOT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./displayAll.php">Products</a>
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
            </div>
        </div>
        </nav>

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

        <!-- checkout form -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        if(!isset($_SESSION['username'])){
                            echo "<script>window.open('./user/user_login.php','_SELF')</script>";
                        }
                        // else{
                        //     echo "<script>window.open('./user/payment.php','_SELF')</script>";
                        // }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class='container'>
            <h2 class="text-center text-info mt-5 ">Payment Option</h2>
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-md-6">
                    <a href="https://www.paypal.com" class="mx-5 px-5" target="_blank"><img src="img/loading.jpg" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="./user/order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">Pay Offline</h2></a>
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