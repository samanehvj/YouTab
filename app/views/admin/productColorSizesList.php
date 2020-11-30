<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <h3 class="text-center my-3">
        <?= $this->viewData['productColor']->product_name . " : (" . $this->viewData['productColor']->color_name .")" ?>
    </h3>

    <a href="/product/adminColorSizeAdd/<?= $this->viewData['productColor']->id ?>" class="btn btn-success m-3">
        Add Product Color Size
    </a>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <!--get product color size from db for admin page  -->

        <?php foreach ($this->viewData['productColorSizes'] as $colorSize) : ?>
                <tr>
                    <td><?= $colorSize->id ?></td>
                    <td><?= $colorSize->size_name ?></td>
                    <td><?= $colorSize->qty ?></td>
                    <td>
                        <a href="/product/adminColorSizeEdit/<?= $colorSize->id ?>" class="btn btn-warning">Edit</a>
                        <a href="/product/adminColorSizeDelete/<?= $colorSize->id ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
