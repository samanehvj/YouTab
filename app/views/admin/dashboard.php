<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="table-responsive">

    <p> You Have <?= $this->viewData['subscriberCount'] ?> Subscriber</p>

</div>
<?php

include VIEW . 'admin/layouts/footer.php';
