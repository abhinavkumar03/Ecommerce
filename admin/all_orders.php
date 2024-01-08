<h3 class="text-center text-success my-3">All Order</h3>
<table class="table table-bordered mt-3" style="margin-bottom: 0;">
    <thead class="bg-info text-center">
        <tr>
            <th>S.no</th>
            <th>Order id</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_order = "SELECT * FROM user_order";
            $result = mysqli_query($conn,$select_order);
            $number = 0;
            while($get_data = mysqli_fetch_assoc($result)){
                $amount_due  = $get_data['amount_due'];
                $invoice_number  = $get_data['invoice_number'];
                $total_products  = $get_data['total_products'];
                $order_date = $get_data['order_date'];
                $order_status = $get_data['order_status'];
                $order_id = $get_data['order_id'];
                $number += 1;
            ?>
                <tr class='text-center'>
                <td><?php echo $number ?></td>
                <td><?php echo $order_id ?></td>
                <td><?php echo $amount_due ?></td>
                <td><?php echo $invoice_number ?></td>
                <td><?php echo $total_products ?></td>
                <td><?php echo $order_date ?></td>
                <td><?php echo $order_status ?></td>
                <td><a href='index.php?delete_order=<?php echo $order_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
    </tbody>
</table>
