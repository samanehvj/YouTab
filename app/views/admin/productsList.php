<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
    <!--get  product list  from db in admin page  -->

<div class="table-responsive">
    <a href="/product/adminAdd" class="btn btn-success m-5">Add Product</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>View</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['products'] as $product) : ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->category_id ?></td>
                    <td><?= $product->name ?></td>
                    <td>$<?= $product->price ?></td>
                    <td><?= $product->view ?></td>
                    <td><?= $product->date ?></td>
                    <td>
                        <a href="/product/adminColorList/<?= $product->id ?>" class="btn btn-info">View Colors</a>
                        <a href="/product/adminEdit/<?= $product->id ?>" class="btn btn-warning">Edit</a>
                        <a href="/product/adminDelete/<?= $product->id ?>" class="btn btn-danger">Delete</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
