<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/admin.php');
$_SESSION['redirect'] = "/admin/appointments";
?>

<table class="table table-striped table-hover table-condensed  align-middle">
    <thead>
        <th>id</th>
        <th>Order Token</th>
        <th>User ID</th>
        <th>User Type</th>
        <th>Product name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Status</th>
        <th>Date</th>
    </thead>

    <tbody>
        <?php foreach ($products as $key=>$items) : 
            foreach($items as $product):
            ?>
            <tr>
                <td><?= $orders[$key]['id'] ?></td>
                <td><?= $orders[$key]['order_token'] ?></td>
                <td><?= $orders[$key]['user_id'] ?></td>
                <td><?= $orders[$key]['user_type'] ?></td>
                <td><?= $product->name ?></td>
                <td><?= $product->qty ?></td>
                <td><?= $product->price ?></td>
                <td><?= $orders[$key]['status'] ?></td>
                <td><?= $orders[$key]['date'] ?></td>
            </tr>
        <?php endforeach; endforeach; ?>
    </tbody>
</table>
<?php
include($path . '/layouts/foot.php');
?>