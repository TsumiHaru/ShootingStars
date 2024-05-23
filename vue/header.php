<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOOTINGSTARS</title>
    <link rel="stylesheet"  href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/asset/css/style.css">
    <link rel="stylesheet"  href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/asset/css/mediaqueries.css">
</head>

<body>
    <!-- On démarre la session dans le header, cela evite de le refaire sur chaque page -->
    <?php session_start(); 
    ?>
<section class="nav">
    <section class="navfirst">
<img class="logo" src="/shootingstars/asset/img/logo.png" alt="logo">
    <h1 class="title" >SHOOTING STARS</h1>
    </section>
<nav>
    <ul class="navbar">
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/paccueil.php">Accueil</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/contact.php">Contact</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/profil.php">Mon profil</a></li>
        <!-- Si connecter, espace client et bouton deconnexion -->
        <?php
        if (isset($_SESSION['user'])) {
        ?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="submit" value="Deconnexion" name="bDeconnect">
        </form>
        <?php
        }else {
        ?>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/pinscription.php">Inscription</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/pconnexion.php">Connexion</a></li>
        <?php
        }
        ?>
    </ul> 
</nav>
</section>
    