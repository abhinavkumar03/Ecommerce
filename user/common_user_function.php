<?php
    include("../include/connect.php");
    // include("../function/common_function.php");

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
            $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id=$getProductId";
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

    // user order details
    function get_user_order(){
        global $conn;

        $ip = $_SERVER['REMOTE_ADDR'];
        $username = $_SESSION['username'];
        $get_details = "SELECT * FROM user_table WHERE username = '$username'";
        $result = mysqli_query($conn,$get_details);
        while($result_data = mysqli_fetch_array($result)){
            $user_id = $result_data['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_order = "SELECT * FROM user_order WHERE user_id = $user_id and   order_status='pending'";
                        $result_order = mysqli_query($conn,$get_order);
                        $row_count = mysqli_num_rows($result_order); 
                        if($row_count > 0){
                            echo "<h3 class='text-center mt-4'>You have <span class='text-danger'>$row_count</span> pending order</h3>
                            <p class='text-center pt-2'><a href='profile.php?my_orders' class='text-dark'>Order details</a></p>";
                        }   
                        else{
                            echo "<h3 class='text-center mt-4'>You have zero order pending order</h3>
                            <p class='text-center pt-2'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                        }                    
                            
                    }
                }
            }
        }
    }

    // my order 
    function get_user_order_details(){

    }
?>