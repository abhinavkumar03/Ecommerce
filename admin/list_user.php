<h3 class="text-center text-success my-3">All User</h3>
<table class="table table-bordered mt-3" style="margin-bottom: 0;">
    <thead class="bg-info text-center">
        <tr>
            <th>S.no</th>
            <th>Username</th>
            <th>E-mail</th>
            <th >User Image</th>
            <th>User Address</th>
            <th>User Mobile no.</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_user = "SELECT * FROM user_table";
            $result = mysqli_query($conn,$select_user);
            $number = 0;
            while($get_data = mysqli_fetch_assoc($result)){
                $user_id = $get_data['user_id'];
                $username = $get_data['username'];
                $user_email  = $get_data['user_email'];
                $user_img  = $get_data['user_img'];
                $user_address = $get_data['user_address'];
                $user_mobile = $get_data['user_mobile'];
                $number += 1;
            ?>
                <tr class='text-center'>
                    <td><?php echo $number ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $user_email ?></td>
                    <td style="width:10%" ><img src="../user/user_img/<?php echo $user_img ?>" class="view-img" alt=""></td>
                    <td><?php echo $user_address ?></td>
                    <td><?php echo $user_mobile ?></td>
                    <td><a href='index.php?delete_payment=<?php echo $payment_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>
