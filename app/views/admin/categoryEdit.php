<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/category/adminDoEdit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $this->viewData->id ?>" />
        <input type="hidden" name="currentImage" value="<?= $this->viewData->img ?>" />
        <div class="form-group">
            <input value="<?= $this->viewData->name ?>" class="form-control" id="name" name="name" placeholder="Category Name"/>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="customFile">
            <label class="custom-file-label" for="customFile">Category Image</label>
        </div>
        <div class="m-3">
            Current Image:
            <a href="<?= URLROOT . "/" . $this->viewData->img ?>" target="_blank">
                <img src="<?= URLROOT . "/" . $this->viewData->img ?>" width="100px" />
            </a>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Edit</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
