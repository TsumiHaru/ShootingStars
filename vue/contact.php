<?php
$title = "Page d'accueil";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
<!-- Formulaire contact -->
<section class="contact">
    <h2>Bonjour</h2>
    <p>Vous pouvez nous contacter en remplissant le formulaire ci-dessous</p>
        <form class="contact_form" action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/controller/userController.php" method="POST">
            <p>Nom d'utilisateur</p>
            <input type="text" name="username"  size="50"><br>
            <p>Adresse mail</p>
            <input type="text" name="email" size="50"><br>
            <p>Demande de contact</p>
            <input type="text" name="contact" size="50" style="height: 130px;"><br>
            <input class="calltoaction" type="submit" value="Envoyez" name="bForm">
        </form>
</section>
<?php
} else {
    header("Location: ../index.php");
}


?>