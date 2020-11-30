<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/product/adminDoEdit" >
        <input type="hidden" name="id" value="<?= $this->viewData['product']->id ?>" />
        <!--edit  product from db in admin page  -->

        <div class="form-group">
            <input value="<?= $this->viewData['product']->name ?>" class="form-control" id="name" name="name" placeholder="Product Name" required/>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <?php foreach ($this->viewData['categories'] as $category): ?>
                <option
                        value="<?= $category->id ?>"
                        <?= ($category->id == $this->viewData['product']->category_id) ?  'selected' : '' ?>
                >

                    <?= $category->name ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <input value="<?= $this->viewData['product']->price ?>" class="form-control" id="price" name="price" placeholder="Product Price" required/>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Edit</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
