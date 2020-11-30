<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<!--add category to website from admin page -->
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/category/adminDoAdd" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" id="name" name="name" placeholder="Category Name" required/>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="customFile" required />
            <label class="custom-file-label" for="customFile">Category Image</label>
        </div>

        <div class="form-group">
            <label for="info">Description</label>
            <textarea class="form-control" id="info" name="info" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
