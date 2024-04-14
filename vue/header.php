<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShootingStars</title>
    <link rel="stylesheet"  href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/asset/css/style-connexion.css">
</head>

<body>
    <!-- On démarre la session dans le header, cela evite de le refaire sur chaque page -->
    <?php session_start(); 
    ?>
    

    
<section class="nav">
    <section class="navfirst">
<img class="logo" src="/shootingstars/asset/img/logo.png" alt="logo">
    <h1 class="title" >Shooting Stars</h1>
    </section>
<nav>
    <ul class="navbar">
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/paccueil.php">Accueil</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/contact.php">Contact</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/profil.php">Mon profil</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/pinscription.php">Inscription</a></li>
        <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/vue/pconnexion.php">Connexion</a></li>
    </ul>
    <!-- Le bouton déconnexion apparaît -->
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="submit" value="Deconnexion" name="bDeconnect">
    </form>
</nav>

</section>
    