<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mystore";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        echo "connection unsuccessful";
    }
?>