<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/size/adminDoEdit" >
        <input type="hidden" name="id" value="<?= $this->viewData->id ?>" />

        <div class="form-group">
            <input value="<?= $this->viewData->name ?>" class="form-control" id="name" name="name" placeholder="size Name"/>
        </div>


        <button type="submit" class="btn btn-warning mt-3">Edit</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
