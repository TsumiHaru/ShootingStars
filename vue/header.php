<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOOTINGSTARS</title>
    <link rel="stylesheet"  href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/asset/css/style.css">
    <link rel="stylesheet"  href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/asset/css/mediaqueries.css">
</head>

<body>
    <!-- On démarre la session dans le header, cela evite de le refaire sur chaque page -->
    <?php session_start(); 
    ?>
<section class="nav">
    <section class="navfirst">
<img class="logo" src="/asset/img/logo.png" alt="logo">
    <h1 class="title" >SHOOTING STARS</h1>
    </section>
<nav>
    <ul class="navbar">
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/paccueil.php">Accueil</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/contact.php">Contact</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/profil.php">Mon profil</a></li>
        <?php
        // Si l'utilisateur est un admin, on affiche le bouton pour acceder a la page admin
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 1) {
        ?>
            <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/admin.php">Page admin</a></li>
            <?php   
        }
        ?>
        <!-- Si connecter, espace client et bouton deconnexion -->
        <?php
        if (isset($_SESSION['user'])) {
            
        ?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/controller/userController.php" method="POST">
        <input type="submit" value="Deconnexion" name="bDeconnect">
        </form>
        <?php
        }else {
        ?>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/pinscription.php">Inscription</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/pconnexion.php">Connexion</a></li>
        <?php
        }
        ?>
    </ul> 
</nav>
</section>
    