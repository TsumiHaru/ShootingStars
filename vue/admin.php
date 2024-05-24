<?php
include 'header.php';
$title = "Admin Panel";
require($_SERVER['DOCUMENT_ROOT'] . "/model/userModel.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    echo "Vous n'avez pas les droits pour accéder à cette page.";
    exit;
}else{
    

?>

<div class="admin_card">
    <h2><?php echo $title; ?></h2>
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
                <p><?php echo "Nom : " . $user['nom']; ?></p>
                <p><?php echo "Prenom : " . $user['prenom']; ?></p>
                <p><?php echo "Date de naissance : " . $user['date_naissance']; ?></p>
            </div>
            
            <div class="input">
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/vue/adminedit.php" method="POST">
                    <input type="hidden" value="<?php echo $user['ID']; ?>" name="id">
                    <input type="submit" value="Modifier" name="bAdminEditUser">
                </form>
                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/controller/userController.php" method="POST">
                    <input type="hidden" value="<?php echo $user['ID']; ?>" name="id">
                    <input type="submit" name="bAdminDeleteUser" value="Suprimer" />
                </form>
            </div>
        </div>
    <?php
    }
    $reponse->closeCursor();
}
    ?>
</div>               
</body>
</html>