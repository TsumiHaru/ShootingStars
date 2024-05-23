<?php
$title = "Page d'accueil";
include('header.php');

//Si l'utilisateur est connecté
if (isset($_SESSION["user"]) && ($_SESSION["user"]["role"])) {
?>
<section class="profil_card">
    <h2>Mon profil</h2>
    <?php
    echo "<p>Bonjour " . $_SESSION['user']['username'] . "</p>";
    echo "<p>Nom " . $_SESSION['user']['nom'] . "</p>";
    echo "<p>Prenom " . $_SESSION['user']['prenom'] . "</p>";
    echo "<p>Email " . $_SESSION['user']['email'] . "</p>";
    echo "<p>Role " . $_SESSION['user']['role'] . "</p>";
    echo "<p>Date de naissance " . $_SESSION['user']['date_naissance'] . "</p>";
    echo "<p>Date de creation " . $_SESSION['user']['date_creation'] . "</p>";
?>
<!-- Formulaire qui permet d'éditer les données de l'utilisateur connecté -->
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="submit" value="Modifier mes données" name="bEditUser">
    </form>
<!-- Formulaire qui permet de supprimer le compte de l'utilisateur connecté -->
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="hidden" value="<?php echo $_SESSION['user']['ID']; ?>" name="id">
        <input type="submit" value="Supprimer mon compte" name="bDelete">
    </form>
    <?php
    //Si l'utilisateur est un admin
    if ($_SESSION["user"]["role"] === "1") {
        ?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/admin.php" method="POST">
            <input type="submit" value="Gestion des utilisateurs" name="bGestionUser">
        </form>  
</section> 
<?php
    //Sinon on le renvoi a la page de connexion
}
}else {
    header("Location: ../index.php");
}

?>
