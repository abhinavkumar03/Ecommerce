<?php
    $username = $_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_user = "DELETE FROM user_table WHERE username = '$username'";
        $result = mysqli_query($conn,$select_user);
        if($result){
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    else if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>

    <h3 class="text-center text-danger mt-5 mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-4">
        <div class="form-outline my-5">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete account">
        </div>
        <div class="form-outline my-5">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't delete account">
        </div>
    </form>
