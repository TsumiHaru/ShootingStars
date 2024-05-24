
<?php
include 'header.php';
$title = "Edit User";
require($_SERVER['DOCUMENT_ROOT'] . "/model/userModel.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    echo "Vous n'avez pas les droits pour accéder à cette page.";
    exit;
}elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    global $bdd;
    $sqlUser = "SELECT * FROM users WHERE ID = :id";
    $stmtUser = $bdd->prepare($sqlUser);
    $stmtUser->bindParam(':id', $id);

    try {
        $stmtUser->execute();
        $user = $stmtUser->fetch();
        if (!$user) {
            echo "User not found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "Pas d'ID user detecté. Veuillez vous connecter.";
    exit;
}
?>

<div class="admin_edit">
    <h2><?php echo $title; ?></h2>
    <form action="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/controller/userController.php" method="POST">
        <input type="hidden" value="<?php echo $user['ID']; ?>" name="id">
        <div>
            <label for="username">Username:</label>
            <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" name="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" name="email" required>
        </div>
        <div>
            <label for="nom">Nom:</label>
            <input type="text" value="<?php echo htmlspecialchars($user['nom']); ?>" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prenom:</label>
            <input type="text" value="<?php echo htmlspecialchars($user['prenom']); ?>" name="prenom" required>
        <div>
            <input type="submit" value="Update" name="bUpdateUser">
        </div>
    </form>
</div>

</body>
</html>