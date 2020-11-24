<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <a href="/color/adminAdd" class="btn btn-success m-5">Add Color</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hex</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['colors'] as $color) : ?>
                <tr>
                    <td><?= $color->id ?></td>
                    <td><?= $color->name ?></td>
                    <td>#<?= $color->hex ?>  <span class="py-2 px-4 ml-2" style="background-color: #<?= $color->hex ?>"> </span></td>
                    <td>
                        <a href="/color/adminEdit/<?= $color->id ?>" class="btn btn-warning">Edit</a>
                        <a href="/color/adminDelete/<?= $color->id ?>" class="btn btn-danger">Delete</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
