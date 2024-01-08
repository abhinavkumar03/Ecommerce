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
    <title>Traps In Boot</title>
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
            <form class="d-flex" role="search" action="" method="get">
                <input class="form-control me-2" type="search" name="search_data" placeholder="What's your taste" aria-label="Search">
                <button class="btn btn-outline-light mr-2" name="search_data_product" value="search" type="submit"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
            </form>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
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

        <!-- third child -->
        <!-- <div class="bg-light">
            <h3 class="text-center">Restaurant View</h3>
            <p class="text-center"> Open to all to take refreshment, Food and beverage.</p>
        </div> -->

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brand</h4></a>
                    </li>
                    <?php 
                        getBrands();
                    ?>
                    
                </ul>
                <!-- categories to be displaed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php
                        getCategories();
                    ?>
                </ul>
            </div>
            <div class="col-md-10">
            <div class="bg-light mt-3">
                <!-- <h3 class="text-center">Hidden Store</h3> -->
                <h3 class="text-center"> Patients Details </h3>
                <!-- <p class="text-center"> Open to all to take refreshment, Food and beverage.</p> -->
            </div>
                <!-- food items -->
                <div class="row">
                    <!-- <div class="col-md-12">
                        <div class="card mb-3" style="width: 100%; height: 150%; border: 0;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="./img/loading.jpg" class="d-block w-100" style="object-fit: cover;" alt="image1">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="./img/icon.jpeg" class="d-block w-100" style="object-fit: cover;" alt="image2">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="./img/loading.jpg" class="d-block w-100" style="object-fit: cover;" alt="image3">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> -->                 
                    
                        <!-- fe tching products -->
                    <?php
                    if(isset($_GET['search_data_product'])){
                         searchProduct();
                    }
                    else{
                        getProductDetails();
                    }
                        getUniqueCategories();
                        getUniqueBrands();
                    ?>

                </div>
                <!-- col ends -->
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