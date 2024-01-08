<!-- connect file -->
<?php
    include("../include/connect.php");
    session_start();
    include("common_admin_function.php");
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
    <link rel="stylesheet" href="./index.css">
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
        </div>
        </nav>

        <!-- second child -->
        <div class="nav navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Welcome Guest</a>
                </li>
            </ul>
        </div>

        <div class="container-fluid m-3">
            <h1 class="text-center mb-5">Admin Registration</h1>
            <div class="row d-flex justify-content-center " >
                <div class="col-lg-6">
                    <img src="../img/icon.jpeg" alt="admin registraion" class="img-fluid">
                </div>
                <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline">
                            <!-- username field -->
                            <label for="admin_name" class="form-label">Admin name</label>
                            <input type="text" id="admin_name" class="form-control mb-2 mt-2" placeholder="Enter your username" autocomplete="off" required name="admin_name">
                        </div>
                        <div class="form-outline">
                            <!-- email field -->
                            <label for="admin_email" class="form-label">Email</label>
                            <input type="email" id="admin_email" class="form-control mb-2" placeholder="Enter your email" autocomplete="off" required name="admin_email">
                        </div>
                        <div class="form-outline">
                            <!-- password field -->
                            <label for="admin_password" class="form-label">Password</label>
                            <input type="password" id="admin_password" class="form-control mb-2" placeholder="Enter your password" autocomplete="off" required name="admin_password">
                        </div>
                        <div class="form-outline">
                            <!-- user image -->
                            <label for="admin_img" class="form-label">Admin Image</label>
                            <input type="file" id="admin_img" class="form-control" placeholder="Upload your image" autocomplete="off" required name="admin_img">
                        </div>
                        <div class="mb-2 mt-3">
                            <input type="submit" value="Register" class="bg-primary py-2 px-3 border-0 mb-2" name="admin_register">
                            <p class="small font-weight-bold mb-">ALready have a account? <a href="admin_login.php" class="text-info"> Login</a></p>
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

    if(isset($_POST['admin_register'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        
        // password hash
        $admin_password_hash = password_hash($admin_password,PASSWORD_DEFAULT);

        // accessing img
        $admin_img = $_FILES['admin_img']['name']; 

        // accessing temp img
        $temp_admin_img = $_FILES['admin_img']['tmp_name'];
        move_uploaded_file($temp_admin_img ,"./admin_img/$admin_img");

        // select query
        $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_name' or admin_email='$admin_email'";
        $select_result = mysqli_query($conn,$select_query);
        $rows = mysqli_num_rows($select_result);
        
        if($rows == 0){
            // insert query
            $insert_query = "INSERT INTO admin_table (admin_name,admin_email,admin_password,admin_img) VALUES('$admin_name','$admin_email','$admin_password_hash','$admin_img')";
            $result_query = mysqli_query($conn,$insert_query);
            if($result_query){
                echo "<script>alert('Admin is registere succcessfully');</script>";
                echo "<script>window.open('./admin_login.php','_SELF')</script>";
            }
        }
        else{
            echo "<script>alert('Already registered');</script>";
        }
    }

?>