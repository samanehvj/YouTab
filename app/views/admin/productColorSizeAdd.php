<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoColorSizeAdd" >
        <input type="hidden" name="product_color_id" value="<?= $this->viewData['productColor']->id ?>" />

        <div class="form-group">
            <span class="form-control">
                <?= $this->viewData['productColor']->product_name . " (" . $this->viewData['productColor']->color_name . ")" ?>
            </span>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" required/>
        </div>

        <div class="form-group">
            <select class="form-control" id="color" name="size_id" required>
                <option value="">Choose A Size</option>
                <?php foreach ($this->viewData['sizes'] as $size): ?>
                    <option value="<?= $size->id ?>">
                        <?= $size->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
