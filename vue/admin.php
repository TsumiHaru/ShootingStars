<?php
include 'header.php';
$title = "Admin Panel";
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");

?>

<div class="">
    <?php
    //RECUPERATION DE LA CONNEXION A LA BDD
    global $bdd;
    $reponse = $bdd->query('SELECT * FROM users');
    while ($donnees = $reponse->fetch()) {
    ?>
        <div class="">
            <div class="">
                <p><?php echo $donnees['ID']; ?></p>
                <p><?php echo $donnees['username']; ?></p>
            </div>
            <p>
                <?php echo $donnees['date_creation']; ?>
            </p>
            <p>
                <?php echo $donnees['date_connexion']; ?>
            </p>
           
            <div class="">
                <form class="" action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $donnees['users_data_id']; ?>" name="id">
                    <input class="" type="submit" value="Modifier" name="bEditUser">
                </form>
                <form class="" action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $donnees['users_data_id']; ?>" name="id">
                    <input class="" type="submit" name="bAdminDeleteUser" value="Suprimer" />
                </form>
            </div>
        </div>
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requÃªte
    ?>
                    
</body>
</html>