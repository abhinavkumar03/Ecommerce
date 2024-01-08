<!-- connect file -->
<?php
    include("../include/connect.php");
    session_start();
    // include("../function/common_function.php");
    include("./common_admin_function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traps In Boot(Admin dashbosrd)</title>
    <link rel="shortcut icon" href="../img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0 bg-info">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TRAPSINBOOT</a>
                <nav class="navbar navbar-expland-lg" data-bs-theme="dark">
                    <ul class="navbar-nav">
                    <?php
                    if(!isset($_SESSION['admin_name'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='index.php'>Welcome Guest</a>
                    </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='index.php'>Welcome ".$_SESSION['admin_name']."</a>
                    </li>";
                    }
                ?>
                <?php  
                    if(!isset($_SESSION['admin_name'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./admin_login.php'>Login <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./admin_logout.php'>Logout <i class='fa fa-sign-in' aria-hidden='true'></i></a>
                    </li>";
                    }
                ?>
                    </ul>
                </nav>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>
        </nav>

        <!-- second child -->
        

        <!-- third child -->
        <div class="row">
            <div class="col-md-2 bg-secondary p-0 bg-info">
                
                <!-- sidenav -->
                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <h3 class="bg-dark text-light mb-0 p-2">Admin</h3>
                    <?php
                
                    if(!isset($_SESSION['admin_name'])){
                        echo "<li class='bg-primary nav-item'><img src='./admin_img/loading.jpg' class='admin-img' alt=''></li>";
                    }
                    else{
                        $admin_name = $_SESSION['admin_name'];
                        $select_admin = "SELECT * FROM admin_table WHERE admin_name='$admin_name'";
                        $result_admin = mysqli_query($conn,$select_admin);
                        $admin_data = mysqli_fetch_assoc($result_admin);
                        $admin_img = $admin_data['admin_img'];
                        echo "<li class='bg-primary nav-item'><img src='./admin_img/$admin_img' class='admin-img' alt=''></li>";
                    }
                ?>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra bg-info p-1"><a href="index.php?products" class="nav-link text-light my-1" >Insert Product</a></button> -->
                        <button class="btn-ra bg-info p-1"><a href="index.php?products" class="nav-link text-light my-1" > Add Patients </a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="index.php?view_products" class="nav-link text-light my-1">View Product</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="index.php?view_products" class="nav-link text-light my-1">View Patients </a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="index.php?categories" class="nav-link text-light my-1">Insert Categories</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="index.php?categories" class="nav-link text-light my-1">Add Symptoms</a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="index.php?view_categories" class="nav-link text-light my-1">View Categories</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="index.php?view_categories" class="nav-link text-light my-1">View Symptoms</a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="index.php?brands" class="nav-link text-light my-1">Insert brands</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="index.php?brands" class="nav-link text-light my-1"> Add Deparment </a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="index.php?view_brands" class="nav-link text-light my-1">View brands</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="index.php?view_brands" class="nav-link text-light my-1">View Deparment</a></button>
                    </li>
                    <!-- <li class="nav-item button text-center">
                        <button class="btn-ra p-1 bg-info"><a href="./index.php?all_orders" class="nav-link text-light my-1">All Orders</a></button>
                    </li> -->
                    <li class="nav-item button text-center">
                        <button class="btn-ra p-1 bg-info"><a href="./index.php?all_payment" class="nav-link text-light my-1">All payments</a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <!-- <button class="btn-ra p-1 bg-info"><a href="./index.php?list_user" class="nav-link text-light my-1">List Users</a></button> -->
                        <button class="btn-ra p-1 bg-info"><a href="./index.php?list_user" class="nav-link text-light my-1"> All Doctors </a></button>
                    </li>
                    <li class="nav-item button text-center">
                        <button class="btn-ra p-1 bg-info"><a href="./index.php?logout" class="nav-link text-light my-1">Logout</a></button>
                    </li>
                    <li class="nav-item button text-center">
                        
                    </li>                    
                </ul>
            </div>
            <div class="col-md-10 bg-light p-0">
            
            <div class="bg-secondary text-light">
            <h3 class="text-center p-2 mb-0">Manage details</h3>
        </div>
            <?php
                if(isset($_GET['categories'])){
                    include("categories.php");
                }
                else if(isset($_GET['brands'])){
                    include("brands.php");
                }
                else if(isset($_GET['products'])){
                    include("products.php");
                }
                else if(isset($_GET['view_products'])){
                    include("view_products.php");
                }
                else if(isset($_GET['edit_product'])){
                    include("edit_product.php");
                }
                else if(isset($_GET['delete_product'])){
                    include("delete_product.php");
                }
                else if(isset($_GET['view_categories'])){
                    include("view_categories.php");
                }
                else if(isset($_GET['edit_categories'])){
                    include("edit_categories.php");
                }
                else if(isset($_GET['delete_categories'])){
                    include("delete_categories.php");
                }
                else if(isset($_GET['view_brands'])){
                    include("view_brands.php");
                }
                else if(isset($_GET['edit_brands'])){
                    include("edit_brands.php");
                }
                else if(isset($_GET['delete_brands'])){
                    include("delete_brands.php");
                }
                else if(isset($_GET['all_orders'])){
                    include("all_orders.php");
                }
                else if(isset($_GET['all_payment'])){
                    include("all_payment.php");
                }
                else if(isset($_GET['list_user'])){
                    include("list_user.php");
                }
                else if(isset($_GET['logout'])){
                    include("admin_logout.php");
                }
                else{
                    // echo "<h1 class='text-center m-5 p-5 text-success'>Get started to modify webpage</h1>";
                    echo "<h1 class='text-center m-5 p-5 text-success'>Get started to modify Details </h1>";
                }
            ?>
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