<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Birthdate</th>
                <th>Country</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->viewData['subscribers'] as $subscriber) : ?>
                <tr>
                    <td><?= $subscriber->id ?></td>
                    <td><?= $subscriber->first_name ?></td>
                    <td><?= $subscriber->last_name ?></td>
                    <td><?= $subscriber->phone ?></td>
                    <td><?= $subscriber->email ?></td>
                    <td><?= $subscriber->birthdate ?></td>
                    <td><?= $subscriber->country ?></td>
                    <td><img src="<?= URLROOT . '/' . $subscriber->image ?>" width="50"> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
