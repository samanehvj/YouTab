<?php
$action = $this->getAction();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $this->pageTitle ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/contact.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">


    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header brand-name">
            <h3>YouTab</h3>
        </div>

        <ul class="list-unstyled components nav-text">
            <li <?= ($action == 'index') ? "class='active'" : '' ?> >
<!--                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Welcome</a>-->
                <a href="/home/index" <?= ($action == 'index') ? "class='active'" : '' ?> >Welcome</a>
            </li>
            <li <?= ($action == 'products') ? "class='active'" : '' ?> >
                <a href="/product/products" >Shop</a>
            </li>
            <li <?= ($action == 'about') ? "class='active'" : '' ?> >
                <a href="/home/about"  >About</a>
            </li>
            <li <?= ($action == 'contact') ? "class='active'" : '' ?> >
                <a href="/home/contact" >Contact</a>
            </li>
            <?php if(isset($_SESSION['userId'])): ?>
                <hr class="text-light border border-light">
                <?php if(isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']): ?>
                    <li>
                        <a href="/admin/dashboard" > Admin Dashboard</a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="/user/logout" >Logout</a>
                </li>
            <?php endif; ?>

<!--            <li>-->
<!--                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Shop</a>-->
<!--                <ul class="collapse list-unstyled" id="pageSubmenu">-->
<!--                    <li>-->
<!--                        <a href="#">Page 1</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Page 2</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Page 3</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

        </ul>

        <ul class="list-unstyled CTAs nav-text">
            <li>
                <a href="#" class="return">Return Policy</a>
            </li>
            <li>
                <a href="" class="Shipping">Shipping</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="min-vh-100">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fas fa-align-left"></i>
                </button>
                <a href="/home/index">
                <img src="/imgs/logo-black.png" class="img-fluid menu-logo-img">
                </a>
                <ul class="nav btn-nav ">
                    <li class="d-inline mr-2 active">
                        <a href="/home/auth" class="d-inline" href="#"><i class="fas fa-user"></i> <span class="menu-shop"> Acount</span></a>
                    </li>
                    <li class="d-inline">
                        <a class="d-inline" href="/product/addToCart"><i class="fas fa-shopping-cart"></i> <span class="menu-shop"> Cart</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Start of body content -->