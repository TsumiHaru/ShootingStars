<?php
include 'header.php';
$title = "Admin Panel";
require($_SERVER['DOCUMENT_ROOT'] . "/model/userModel.php");
?>
<div class="admin_card">
    <?php
    //RECUPERATION DE LA CONNEXION A LA BDD
    global $bdd;
   $reponse = $bdd->query('SELECT * FROM users');
   $mediaEntries = [];
   while ($donnees = $reponse->fetch()) {
       $mediaEntries[] = $donnees;
   }
   $users = getUsers();
   foreach ($users as $user) {
    ?>
        <div class="admin_cards">
            <div>
                <p><?php echo "ID de l'utilisateur : " . $user['ID']; ?></p>
                <p><?php echo "Username : " . $user['username']; ?></p>
                <p><?php echo "Email : " .  $user['email']; ?></p>
            </div>
            
            <div class="input">
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $user['ID']; ?>" name="id">
                    <input class="" type="submit" value="Modifier" name="bEditUser">
                </form>
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $user['ID']; ?>" name="id">
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