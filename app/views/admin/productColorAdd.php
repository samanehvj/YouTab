<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoColorAdd" >
        <div class="form-group">
            <input type="hidden" class="form-control" id="product" name="product_id"
                   value="<?= $this->viewData['product']->id ?>"
            />
            <span class="form-control"><?= $this->viewData['product']->name ?></span>
        </div>

        <div class="form-group">
            <select class="form-control" id="color" name="color_id" required>
                <option value="">Choose A Color</option>
                <?php foreach ($this->viewData['colors'] as $color): ?>
                    <option value="<?= $color->id ?>">
                        #<?= strtoupper($color->hex) ?> - <?= $color->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
