<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <a href="/category/adminAdd" class="btn btn-success m-5">Add Category</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['categories'] as $category) : ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><img src="<?= URLROOT . '/' . $category->img ?>" width="50"> </td>
                    <td>
                        <a href="/category/adminEdit/<?= $category->id ?>" class="btn btn-warning">Edit</a>
                        <a href="/category/adminDelete/<?= $category->id ?>" class="btn btn-danger">Delete</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
