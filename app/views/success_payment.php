<?php include VIEW . 'layouts/header.php' ?>

<div class="container h-100">
    <?php if ($this->viewData): ?>
        <h1 class="text-center m-5">
            Thank You For Your Shopping, Your Order Number Is: (<?= $this->viewData ?>)
        </h1>
    <?php endif; ?>
</div>

<?php include VIEW . 'layouts/footer.php' ?>
