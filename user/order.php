<?php
    include("../include/connect.php");
    include("common_user_function.php");
    session_start();

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        // $user_id = $_SESSION['user_id'];
    
    // getting total items and total price of all items
    $ip = $_SERVER['REMOTE_ADDR'];
    $total_price = 0;
    $invoice_number = mt_rand();
    $status = 'pending'; 
    $select_item = "SELECT * FROM cart_details";
    $result_item = mysqli_query($conn,$select_item);
    $total_item = mysqli_num_rows($result_item);
    while($item_data = mysqli_fetch_assoc($result_item)){
        $product_id = $item_data['product_id'];
        $select_product = "SELECT * fROM products WHERE product_id = $product_id";
        $result_product = mysqli_query($conn,$select_product);
        while($product_data = mysqli_fetch_assoc($result_product)){
            $product_price = $product_data['product_price'];
            $total_price += $product_price;
        }
    }
    // getting quantity from quantity
    $subtotal = 0;
    $get_cart = "SELECT * FROM cart_details";
    $run_cart = mysqli_query($conn,$get_cart);
    $get_item_quantity = mysqli_fetch_array($run_cart);
    // $quantity = mysqli_num_rows($get_item_quantity);
    // if($quantity == 0){
    //     $quantity = 1;
    //     $subtotal = $total_price;
    // }
    // else{
    //     $subtotal = (int)$total_price * (int)$quantity;
    // }

    $insert_order = "INSERT INTO user_order (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$total_price,$invoice_number,$total_item,NOW(),'$status')";
    $result_order = mysqli_query($conn,$insert_order);
    // if($result_order){
    //     echo "<script>alert('orders are submitted succesfully')</script>";
    //     echo "<script>window.open('profile.php','_SELF')</script>";
    // }

    // order pending 
    $insert_pending_order = "INSERT INTO pending_order (user_id,invoice_number,product_id,order_status) VALUES ($user_id,$invoice_number,$product_id,'$status')";
    $result_pending_order = mysqli_query($conn,$insert_pending_order);
    if($result_pending_order){
        echo "<script>alert('orders are submitted succesfully')</script>";
        echo "<script>window.open('profile.php?','_SELF')</script>";
    }

    // delete item from cart
    $empty_cart = "DELETE FROM cart_details WHERE ip_address='$ip'";
    $result_delete = mysqli_query($conn,$empty_cart);
}

?>
