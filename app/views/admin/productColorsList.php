<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <h3 class="text-center my-3"><?= $this->viewData['product']->name ?></h3>
    <a href="/product/adminColorAdd/<?= $this->viewData['product']->id ?>" class="btn btn-success m-3">Add Product Color</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hex</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<!--        get product color list from db -->
            <?php foreach ($this->viewData['productColors'] as $color) : ?>
                <tr>
                    <td><?= $color->id ?></td>
                    <td><?= $color->name ?></td>
                    <td>#<?= $color->hex ?>  <span class="py-2 px-4 ml-2" style="background-color: #<?= $color->hex ?>"> </span></td>
                    <td>
                        <a href="/product/adminColorImageList/<?= $color->id ?>" class="btn btn-primary">View Images</a>
                        <a href="/product/adminColorSizeList/<?= $color->id ?>" class="btn btn-info">View Sizes</a>
                        <a href="/product/adminColorDelete/<?= $color->id ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
