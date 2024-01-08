<?php
    include('../include/connect.php');
    $username = $_SESSION['username'];
    $select_user = "SELECT * FROM user_table WHERE username = '$username'";
    $result_user = mysqli_query($conn,$select_user);
    $user_details = mysqli_fetch_assoc($result_user);
    $user_email = $user_details['user_email'];
    $user_img = $user_details['user_img'];
    $user_address = $user_details['user_address'];
    $user_mobile = $user_details['user_mobile'];

    if(isset($_POST['submit'])){
        $new_username = $_POST['username'];
        $new_user_email = $_POST['user_email'];    
        $new_user_address = $_POST['user_address'];    
        $new_user_mobile = $_POST['user_mobile'];    
        $user_img = $_FILES['user_img']['name'];
        $temp_user_img = $_FILES['user_img']['tmp_name'];
        move_uploaded_file($temp_user_img,"./user_img/$user_img");   

        $update_user = "UPDATE user_table SET username='$new_username', user_email='$new_user_email', user_address='$new_user_address', user_mobile='$new_user_mobile', user_img='$user_img'";
        $result_update = mysqli_query($conn,$update_user);

        echo "<script>alert('Data updated succesfully')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";

    }


?>
<div class="container ">
    <h3 class="text-center text-success">Edit Details</h3>
        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline w-50 m-auto">
                            <!-- username field -->
                            <label for="username" class="form-label mt-5">Username</label>
                            <input type="text" id="username" class="form-control mb-2 mt-2" placeholder="Enter your username" value="<?php echo $username; ?>" autocomplete="off" required name="username">
                        </div>
                        <div class="form-outline w-50 m-auto">
                            <!-- email field -->
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control mb-2" placeholder="Enter your email" value="<?php echo $user_email; ?>" autocomplete="off" required name="user_email">
                        </div>
                        <div class="form-outline w-50 m-auto">
                            <!-- user image -->
                            <div class="d-flex align-items-center ">
                                <div class="w-100">
                                <label for="user_img" class="form-label">Username Image</label>
                                <input type="file" id="user_img" class="form-control mb-2" autocomplete="off" required name="user_img">
                                </div>
                            <img style="width: 20%;" src="./user_img/<?php echo $user_img; ?>" alt="">
                            </div>
                        </div>
                        
                        <div class="form-outline w-50 m-auto">
                            <!-- user address field -->
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control mb-2" placeholder="Enter your address" value="<?php echo $user_address; ?>" autocomplete="off" required name="user_address">
                        </div>
                        <div class="form-outline w-50 m-auto">
                            <!-- user contact field -->
                            <label for="user_mobile" class="form-label">Contact</label>
                            <input type="text" id="user_mobie" class="form-control mb-2" placeholder="Enter your contact number" value="<?php echo $user_mobile; ?>" autocomplete="off" required name="user_mobile">
                        </div>
                        <div class="form-outline d-flex justify-content-center">
                            <input type="submit" value="submit" class="bg-primary my-3 mb-5 py-2 px-3 border-0 mb-2" name="submit">
                        </div>

        </form>
</div>