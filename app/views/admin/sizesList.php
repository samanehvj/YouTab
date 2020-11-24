<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <a href="/size/adminAdd" class="btn btn-success m-5">Add size</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['sizes'] as $size) : ?>
                <tr>
                    <td><?= $size->id ?></td>
                    <td><?= $size->name ?></td>
                    <td>
                        <a href="/size/adminEdit/<?= $size->id ?>" class="btn btn-warning">Edit</a>
                        <a href="/size/adminDelete/<?= $size->id ?>" class="btn btn-danger">Delete</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
