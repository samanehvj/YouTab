<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoColorImageAdd" enctype="multipart/form-data">
        <input type="hidden" name="product_color_id" value="<?= $this->viewData['productColor']->id ?>" />
        <!--add  product color image   from db in admin page  -->

        <div class="form-group">
            <span class="form-control">
                <?=
                    $this->viewData['productColor']->product_name
                    . " (" .
                    $this->viewData['productColor']->color_name
                    . ")"
                ?>
            </span>
        </div>

        <div class="form-group">
            <input type="file" class="form-control"  name="image" placeholder="Image" required/>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
