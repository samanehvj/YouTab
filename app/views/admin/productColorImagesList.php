<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <h3 class="text-center my-3">
        <?= $this->viewData['productColor']->product_name . " : (" . $this->viewData['productColor']->color_name .")" ?>
    </h3>

    <a href="/product/adminColorImageAdd/<?= $this->viewData['productColor']->id ?>" class="btn btn-success m-3">
        Add Product Color Image
    </a>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <!--upload  product image from admin page  -->

        <?php foreach ($this->viewData['productColorImages'] as $img) : ?>
                <tr>
                    <td><?= $img->id ?></td>
                    <td>
                        <a href="<?= URLROOT . '/' . $img->img ?>" target="_blank">
                            <img src="<?= URLROOT . '/' . $img->img ?>" height="100px" >
                        </a>
                    </td>
                    <td>
                        <a href="/product/adminColorImageDelete/<?= $img->id ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
