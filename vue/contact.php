<?php
$title = "Page d'accueil";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
<!-- Formulaire contact -->
<form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
<input type="text" name="contact" placeholder="Demande de contact" size="80"><br>
    <input type="submit" value="Envoyez formulaire" name="bForm">
<?php
} else {
    header("Location: ../index.php");
}


?>