<?php
$title = "Page d'accueil";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
<!-- Formulaire contact -->
<section class="contact">
    <h2>Contact</h2>
    <p>Vous pouvez nous contacter en remplissant le formulaire ci-dessous</p>
<form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
<p>Nom d'utilisateur</p>
<input type="text" name="username"  size="80"><br>
<p>Adresse mail</p>
<input type="text" name="email" size="80"><br>
<p>Demande de contact</p>
<input type="text" name="contact" size="80" style="height: 130px;"><br>
<input type="submit" value="Envoyez formulaire" name="bForm">
</form>
</section>
<?php
} else {
    header("Location: ../index.php");
}


?>