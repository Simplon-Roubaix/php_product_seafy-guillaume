<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title_page; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= BASE_URL; ?>favicon.ico"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/normalize.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img class="brave" src="../../img/brave.svg" alt="brave">

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <h1 class="navbar-brand mr-5">Seafy & Guillaume cars</h1>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL; ?>controller/BlogController.php">Blog</a>
            </li>
        </ul>

        <ul class="my-2 my-lg-0 navbar-nav">
            <?php if (!isset($_SESSION['user'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>users/login.php">Se connecter<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>users/register.php">S'enregistrer</a>
                </li>
            <?php else: ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>users/logout.php">Se déconnecter</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container">
    <?php if (isset($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
