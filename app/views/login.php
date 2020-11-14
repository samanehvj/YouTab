<?php include VIEW . 'layouts/header.php' ?>



<div class="logo">
    <img src="/imgs/logo-black.png" alt="logo" width="25%">
</div>
<div class="log-form">
    <h2>Login to your YouTab account</h2>
    <form action="<?= URLROOT ?>/home/doLogIn" method="POST">
        <input type="text" title="username" name="username" placeholder="username" />
        <input type="password" title="username" name="password" placeholder="password" />
        <button type="submit" class="btn">Login</button>
    </form>
</div>
<!--end log form -->
