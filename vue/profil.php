<?php
$title = "Page d'accueil";
include('header.php');

//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
    <h2>Mon profil</h2>
<?php
//Petit message pour indiquer son nom
    echo "Bonjour " . $_SESSION['user']['nom'];
?>
<!-- Nom d'utilisateur -->
    <p>Nom d'utilisateur : <?php echo $_SESSION['user']['nom']; ?></p>
<!-- Prénom d'utilisateur -->
    <p>Prénom d'utilisateur : <?php echo $_SESSION['user']['prenom']; ?></p>
<!-- Adresse mail -->
    <p>Adresse mail : <?php echo $_SESSION['user']['email']; ?></p>
<!-- Date de naissance -->
    <p>Date de naissance : <?php echo $_SESSION['user']['date_naissance']; ?></p>
<!-- Mot de passe -->
    <p>Mot de passe : <?php echo $_SESSION['user']['password']; ?></p>
<!-- Formulaire qui permet d'éditer les données de l'utilisateur connecté -->
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="submit" value="Modifier mes données" name="bEditUser">
    </form>
<!-- Formulaire qui permet de supprimer le compte de l'utilisateur connecté -->
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ShootingStars/controller/userController.php" method="POST">
        <input type="hidden" value="<?php echo $_SESSION['user']['ID']; ?>" name="id">
        <input type="submit" value="Supprimer mon compte" name="bDelete">
    </form>
<!-- Ajouter un utilisateur -->

</section>    

<!-- Articles -->
<?php
    //Sinon on le renvoi a la page de connexion
} else {
    header("Location: ../index.php");
}

?>
