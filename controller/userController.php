<?php
// On récupère notre model avec toutes les fonctions
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");
session_start();

if (isset($_POST['bInscription']) || isset($_POST['bEditUserData'])) {
    $nom = htmlspecialchars(strtolower(trim($_POST['nom'])));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $password1 = htmlspecialchars(trim($_POST['password1']));
    $password2 = htmlspecialchars(trim($_POST['password2']));
    $role = 0;

    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($date_naissance) && !empty($username)) {
        if ($password1 === $password2) {
            $password_hashed = password_hash($password1, PASSWORD_DEFAULT);
            if (!empty($password1) && isset($_POST['bInscription'])) {
                $date_naissance = date('Y-m-d', strtotime($date_naissance));
                $message = insertData($username, $password_hashed, $nom, $prenom, $email, $date_naissance, $role);

                if ($message) {
                    header("Location: ../vue/pinscription.php?message=" . urlencode($message));
                    exit;
                }
                header("Location: ../vue/pconnexion.php?success");
                exit;
            } else {
                if (empty($password1)) {
                    $password1 = $_SESSION['user']['password'];
                }
                $id = $_SESSION['user']['ID'];
                if (update($id, $nom, $prenom, $email, $date_naissance, $username, $password1)) {
                    session_destroy();
                    session_start();
                    login($username, $password1);
                    header("Location: ../vue/paccueil.php?success");
                    exit;
                } else {
                    header("Location: ../vue/pinscription.php?error");
                    exit;
                }
            }
        } else {
            header("Location: ../vue/pinscription.php?message=Les mots de passe ne correspondent pas.");
            exit;
        }
    } else {
        header("Location: ../vue/pinscription.php?message=Veuillez remplir tous les champs.");
        exit;
    }
}elseif (isset($_POST['bConnexion'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    // On appelle la fonction login
    $message = login($username, $password);
    if ($message === true) {
        header("Location: ../vue/paccueil.php?login=success");
        exit;
    } else {
        header("Location: ../vue/pconnexion.php?message=" . urlencode($message));
        exit;
    }
} elseif (isset($_POST['bEditUser'])) {
    header("Location: ../vue/pinscription.php");
    exit;
} elseif (isset($_POST['bDeconnect'])) {
    logout();
    header("Location: ../index.php");
    exit;
} elseif (isset($_POST['bDelete'])) {
    $id = $_POST['id'];
    $id2 = $_SESSION['user']['users_data_id'];
    if (drop($id, $id2)) {
        logout();
        header("Location: ../index.php");
        exit;
    }
}
?>