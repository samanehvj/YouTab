<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
    <!--edit order from admin page -->

<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/order/adminDoEdit" >
    <h1 class="text-center m-5">Order Number: <?= $this->viewData->id ?></h1>
        <input type="hidden" name="id" value="<?= $this->viewData->id ?>" />

        <div class="form-group">
            <select class="form-control" id="color" name="is_delivered" required>
                <option value="">Set Delivery Status</option>
                <option <?= $this->viewData->is_delivered ? '' : 'selected' ?> value="0">Pending</option>
                <option <?= $this->viewData->is_delivered ? 'selected' : '' ?> value="1">Delivered</option>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control" id="color" name="is_canceled" required>
                <option value="">Set Order Status</option>
                <option <?= $this->viewData->is_canceled ? 'selected' : '' ?> value="0">Canceled</option>
                <option <?= $this->viewData->is_canceled ? '' : 'selected' ?> value="1">Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Edit</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
