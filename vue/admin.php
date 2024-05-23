<?php
include 'header.php';
$title = "Admin Panel";
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");
?>
<div class="admin_card">
    <?php
    //RECUPERATION DE LA CONNEXION A LA BDD
    global $bdd;
    $reponse = $bdd->query('SELECT * FROM users');
    while ($donnees = $reponse->fetch()) {
    ?>
        <div>
            <div>
                <p><?php echo $donnees['ID']; ?></p>
                <p><?php echo $donnees['username']; ?></p>
            </div>
            <p>
                <?php echo $donnees['email']; ?>
            </p>
            <p>
                <?php echo $donnees['date_naissance']; ?>
            </p>
            <div class="input">
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $donnees['ID']; ?>" name="id">
                    <input class="" type="submit" value="Modifier" name="bEditUser">
                </form>
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/shootingstars/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $donnees['ID']; ?>" name="id">
                    <input class="" type="submit" name="bAdminDeleteUser" value="Suprimer" />
                </form>
            </div>
        </div>
    <?php
    }
    $reponse->closeCursor();
    ?>
</div>               
</body>
</html>