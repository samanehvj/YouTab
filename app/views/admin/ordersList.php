<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Price</th>
                <th>Delivered</th>
                <th>Canceled</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['orders'] as $order) : ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td><?= $order->name ?></td>
                    <td><?= $order->date ?> </td>
                    <td><?= $order->total_price ?> </td>
                    <td><?= $order->is_delivered ? 'Delivered' : 'Pending' ?> </td>
                    <td><?= $order->is_canceled ? 'Canceled' : 'Active' ?> </td>
                    <td>
                        <a href="/order/adminEdit/<?= $order->id ?>" class="btn btn-warning">Edit</a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
