<?php
    $action = $this->getAction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $this->pageTitle ?></title>
</head>
<body>

    <header class="header">
        <a href="" class="logo">YouTab</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
            <li><a href="/home/index" <?= ($action == 'index') ? "class='active'" : '' ?> >Home</a></li>
            <li><a href="/home/about" <?= ($action == 'about') ? "class='active'" : '' ?> >About</a></li>
            <li><a href="/product/products" <?= ($action == 'products') ? "class='active'" : '' ?> >Products</a></li>
            <li><a href="/home/contact" <?= ($action == 'contact') ? "class='active'" : '' ?> >Contact</a></li>
        </ul>
    </header>
    <div class="container">
