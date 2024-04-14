<?php
$title = "Page d'accueil";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
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
//Petit message pour indiquer son nom
    echo "Bonjour " . $_SESSION['user']['nom'];

?>
<!-- Articles -->
<?php
    //Sinon on le renvoi a la page de connexion
} else {
    header("Location: ../index.php");
}


?>