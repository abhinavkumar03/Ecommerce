<!-- connect file -->
<?php
    include("../include/connect.php");
    
    include("./common_user_function.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traps In Boot : user dashboard</title>
    <link rel="shortcut icon" href="../img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- index css file -->
    <link rel="stylesheet" href="../index.css">
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
                <a class="nav-link" href="profile.php">My account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
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
                        echo "<script>window.open('index.php','_self')</script>";
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
                        <a class='nav-link' href='user_login.php'>Login <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='user_logout.php'>Logout <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                ?>
            </ul>
        </div>

        <!-- third child -->
        <!-- <div class="bg-light">
            <h3 class="text-center">Restaurant View</h3>
            <p class="text-center"> Open to all to take refreshment, Food and beverage.</p>
        </div> -->

        <!-- fourth child -->
        <div class="row">
            
            <div class="col-md-2 m-0 text-center p-0">
                <ul class="navbar-nav bg-secondary" style="height:100%">
                    <li class="bg-primary nav-item"><a href="#" class="nav-link text-light"><h4>Your Profile</h4></a></li>
                    <?php
                        $username = $_SESSION['username'];
                        $select_img_query = "SELECT * FROM user_table WHERE username='$username'";
                        $result_img_query = mysqli_query($conn,$select_img_query);
                        $img_data = mysqli_fetch_assoc($result_img_query);
                        $user_img = $img_data['user_img'];
                        echo "<li class='bg-primary nav-item'><img src='./user_img/$user_img' class='user_img card-img-top' alt=''></li>";
                    ?>
                    <li class="bg-secondary nav-item pt-3"><a href="profile.php?" class="nav-link text-light">Pending Orders</a></li>
                    <li class="bg-secondary nav-item pt-3"><a href="profile.php?edit_account" class="nav-link text-light">Edit account</a></li>
                    <li class="bg-secondary nav-item pt-3"><a href="profile.php?my_orders" class="nav-link text-light">My orders</a></li>
                    <li class="bg-secondary nav-item pt-3"><a href="profile.php?delete_account" class="nav-link text-light">Delete account</a></li>
                    <li class="bg-secondary nav-item py-3"><a href="user_logout.php" class="nav-link text-light">Logout</a></li>

                </ul>
            </div>
            <div class="col-md-10 p-0">
            <div class="bg-light m-0 ">
                <h3 class="text-center">Restaurant View</h3>
                <p class="text-center"> Open to all to take refreshment, Food and beverage.</p>
            </div>
                <?php 
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }else if(isset($_GET['my_orders'])){
                        include('my_orders.php');
                    }else if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                    else{
                        get_user_order();
                    }
                    
                ?>
            </div>
        </div>





        <!-- last child -->
        <div class="bg-dark text-light p-3 text-center">
            <p>All rights reserved &copy; - Designed by Abhinav-2023</p>
        </div>
    </div>
    <!-- bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php
    
?>

