<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoAdd" >
        <div class="form-group">
            <input class="form-control" id="name" name="name" placeholder="Product Name" required/>
        </div>
        <!--add  product  from db in admin page  -->
        <div class="form-group">
            <select class="form-control" id="category" name="category" required>
                <option value="">Choose A Category</option>
                <?php foreach ($this->viewData['categories'] as $category): ?>
                    <option value="<?= $category->id ?>">
                        <?= $category->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <input  class="form-control" id="price" name="price" placeholder="Product Price" required/>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
