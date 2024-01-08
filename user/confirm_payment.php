<!-- connect file -->
<?php
    include("../include/connect.php");
    
    include("./common_user_function.php");
    session_start();
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $select_data = "SELECT * FROM user_order WHERE order_id = $order_id";
        $result_data = mysqli_query($conn,$select_data);
        $get_data = mysqli_fetch_assoc($result_data);
        $invoice_number = $get_data['invoice_number'];
        $amount_due = $get_data['amount_due'];
    }
    if(isset($_POST['confirm_payment'])){
        // $invoice_number = $_POST['invoice_number'];
        // $amount_due = $_POST['amount_due'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO user_payment (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount_due,'$payment_mode')";
        $result = mysqli_query($conn,$insert_query);
        if($result){
            echo "<h3 class='text-center text-light'>Successfully payment </h3>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        // update order status
        $update_order = "UPDATE user_order SET order_status = 'complete'  WHERE order_id=$order_id";
        $result_update = mysqli_query($conn,$update_order);

        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traps In Boot : payment</title>
    <link rel="shortcut icon" href="../img/icon.jpeg" type="image/x-icon">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- index css file -->
    <link rel="stylesheet" href="../index.css">
</head>
<body class=" bg-secondary">
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
        <div class="container mt-3">
            <form action="" method="post">
                <h1 class="text-center text-light mt-5">confirm Payment</h1>
                <div class="form-outline text-center my-2 py-4 w-50 m-auto">
                    <label for="" class="text-light">invoice number</label>
                    <input type="text" class="form-control w-50 m-auto" name="invoice_number" id="" value="<?php echo $invoice_number ?>" disabled>
                </div>
                <div class="form-outline text-center pb-4 w-50 m-auto">
                    <label for="" class="text-light">Amount</label>
                    <input type="text" class="form-control w-50 m-auto" name="amount_due" id="" value="<?php echo $amount_due; ?>" disabled>
                </div>
                <div class="form-outline text-center pb-4 w-50 m-auto">
                    <select name="payment_mode" id="" class="form-select w-50 m-auto">
                        <option>Select Payment Mode</option>
                        <option value="UPI">UPI</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="Paypal">Paypal</option>
                        <option value="COD">COD(cash on delivery)</option>
                    </select>
                </div>
                <div class="form-outline text-center pb-5 w-50 m-auto">
                    <input type="submit" class="btn bg-info border-0  mb-5" value="confirm_Payment" name="confirm_payment">
                </div>
            </form>
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
