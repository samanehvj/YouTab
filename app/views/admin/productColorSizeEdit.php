<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoColorSizeEdit" >
        <input type="hidden" name="product_color_size_id" value="<?= $this->viewData['productColorSize']->id ?>" />
        <input type="hidden" name="product_color_id" value="<?= $this->viewData['productColorSize']->product_color_id ?>" />

        <div class="form-group">
            <span class="form-control">
                <?= $this->viewData['productColorSize']->size_name ?>
            </span>
        </div>

        <div class="form-group">
            <input value="<?= $this->viewData['productColorSize']->qty ?>" type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" required/>
        </div>


        <button type="submit" class="btn btn-success mt-3">Edit</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
