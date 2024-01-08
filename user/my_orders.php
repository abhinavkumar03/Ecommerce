

<h3 class="text-center text-success">All my orders</h3>
<table class="table table-bordered mt-4">
    <thead class="bg-info">
    <tr>
        <th>S.no</th>
        <th>Amount Due</th>
        <th>total products</th>
        <th>invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-dark text-light">
        
<?php
    $username = $_SESSION['username'];
    // $user_id = $_SESSION['user_id'];
    $get_user = "SELECT * FROM user_table WHERE username='$username'";
    $result = mysqli_query($conn,$get_user);
    $get_user_data = mysqli_fetch_assoc($result);
    $user_id = $get_user_data['user_id'];
    $select_query = "SELECT * FROM user_order WHERE user_id='$user_id'";
    $result_query = mysqli_query($conn,$select_query);
    $num = 0;
    while($result_data = mysqli_fetch_assoc($result_query)){
        $order_id = $result_data['order_id'];
        $amount_due = $result_data['amount_due'];
        $total_products = $result_data['total_products'];
        $invoice_number = $result_data['invoice_number'];
        $order_date = $result_data['order_date'];
        $order_status = $result_data['order_status'];
        if($order_status == 'pending'){
            $order_status = 'incomplete';
        }
        $num += 1;
        echo "<tr>
        <td>$num</td>
        <td>$amount_due</td>
        <td>$total_products</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>;"
        ?>
        <?php
        if($order_status == 'complete'){
            echo "<td>Paid</td></tr>";    
        }
        else{
            echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
            </tr>";
        }
        
    }

?>
    </tbody>
</table>