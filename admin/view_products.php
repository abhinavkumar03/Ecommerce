<!-- <h3 class="text-center text-success mt-3">All products</h3> -->
<h3 class="text-center text-success mt-3">All Patients Details </h3>
<table class="table table-bordered mt-3" style="margin-bottom: 0;">
    <thead class="bg-info text-center">
        <tr>
            <th>S.no</th>
            <th>Product ID</th>
            <th>Product img</th>
            <th>Product title</th>
            <th>Product price</th>
            <!-- need to do a work -->
            <!-- <th>Total sold</th> -->
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_product = "SELECT * FROM products";
            $result = mysqli_query($conn,$select_product);
            $number = 0;
            while($get_data = mysqli_fetch_assoc($result)){
                $product_id = $get_data['product_id'];
                $product_title = $get_data['product_title'];
                $product_img = $get_data['product_img1'];
                $product_price = $get_data['product_price'];
                $status = $get_data['status'];
                $number += 1;
            ?>
                <tr class='text-center'>
                <td><?php echo $number ?></td>
                <td><?php echo $product_id ?></td>
                <td style="width: 15%;"><img src='./product_img/<?php echo $product_img ?>' alt='' class='card-img-top view-img'></td>
                <td><?php echo $product_title ?></td>
                <td><?php echo $product_price ?></td>
                <td><?php echo $status ?></td>
                <td><a href='index.php?edit_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
        
    </tbody>
</table>