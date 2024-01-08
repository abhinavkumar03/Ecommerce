<!-- <h3 class="text-center text-success mt-3">All categories</h3> -->
<h3 class="text-center text-success mt-3">All Sympotomes </h3>

<table class="table table-bordered mt-3" style="margin-bottom: 0;">
    <thead class="bg-info text-center">
        <tr>
            <th>S.no</th>
            <th>categories_id</th>
            <th>categories_title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_categories = "SELECT * FROM categories";
            $result = mysqli_query($conn,$select_categories);
            $number = 0;
            while($get_data = mysqli_fetch_assoc($result)){
                $categories_id  = $get_data['categories_id'];
                $categories_title = $get_data['categories_title'];
                $number += 1;
            ?>
                <tr class='text-center'>
                <td><?php echo $number ?></td>
                <td><?php echo $categories_id ?></td>
                <td><?php echo $categories_title ?></td>
                <td><a href='index.php?edit_categories=<?php echo $categories_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_categories=<?php echo $categories_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        ?>
        
    </tbody>
</table>
