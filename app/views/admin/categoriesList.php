<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['categories'] as $category) : ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><img src="<?= URLROOT . '/' . $category->img ?>" width="50"> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
