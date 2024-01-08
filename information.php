<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "Welcome ".$_SESSION['username'];
        echo "Your password is ".$_SESSION['password'];
    }
    else{
        echo "Please login first";
    }

?>