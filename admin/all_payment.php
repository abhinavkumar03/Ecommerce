<h3 class="text-center text-success my-3">All Payments</h3>
<table class="table table-bordered mt-3" style="margin-bottom: 0;">
    <thead class="bg-info text-center">
        <tr>
            <th>S.no</th>
            <th>Invoice number</th>
            <th>amount</th>
            <th>Payment mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_payment = "SELECT * FROM user_payment";
            $result = mysqli_query($conn,$select_payment);
            $number = 0;
            while($get_data = mysqli_fetch_assoc($result)){
                $payment_id = $get_data['payment_id'];
                $invoice_number  = $get_data['invoice_number'];
                $amount  = $get_data['amount'];
                $payment_mode = $get_data['payment_mode'];
                $payment_date = $get_data['payment_date'];
                $number += 1;
            ?>
                <tr class='text-center'>
                    <td><?php echo $number ?></td>
                    <td><?php echo $invoice_number ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $payment_mode ?></td>
                    <td><?php echo $payment_date ?></td>
                    <td><a href='index.php?delete_payment=<?php echo $payment_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>
