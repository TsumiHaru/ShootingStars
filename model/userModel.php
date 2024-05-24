<?php
include($_SERVER['DOCUMENT_ROOT'] . "/model/dbconnect.php");

// Fonction insertion de données
function insertData($username, $password, $nom, $prenom, $email, $date_naissance, $role) {
    global $bdd;
    $querysql = "INSERT INTO users (username, password, nom, prenom, email, date_naissance, role) 
                 VALUES (:username, :password, :nom, :prenom, :email, :date_naissance, :role)";
    $stmtUserData = $bdd->prepare($querysql);
    $stmtUserData->bindParam(":username", $username);
    $stmtUserData->bindParam(":password", $password);
    $stmtUserData->bindParam(":nom", $nom);
    $stmtUserData->bindParam(":prenom", $prenom);
    $stmtUserData->bindParam(":email", $email);
    $stmtUserData->bindParam(":date_naissance", $date_naissance);
    $stmtUserData->bindParam(":role", $role);
    try {
        $stmtUserData->execute();
        return null;
    } catch (PDOException $e) {
        return "Une erreur s'est produite dans l'insertion : " . $e->getMessage();
    }
}

// Fonction de connexion
function login($username, $password) {
    global $bdd;
    $sqlUser = "SELECT * FROM users WHERE username = :username ";
    $stmtUsers = $bdd->prepare($sqlUser);
    $stmtUsers->bindParam(":username", $username);
    try {
        $stmtUsers->execute();
    } catch (PDOException $e) {
        return "Erreur de connexion : " . $e->getMessage();
    }
    $user = $stmtUsers->fetch();
    if ($user) {  
        if(password_verify($password, $user["password"])){
            $_SESSION["user"] = $user;
        } else {
            
            return "Mot de passe incorrect.";
        } 
    } else {
        return "Nom d'utilisateur incorrect.";
    }
}

    
// Fonction update
function update($id, $nom, $prenom, $email, $date_naissance, $username, $password) {
    global $bdd;
    $querysqlData = "UPDATE users SET username = :username, password = :password WHERE id = :id";
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":id", $id);
    $stmtUsersInsert->bindParam(":username", $username);
    $stmtUsersInsert->bindParam(":password", $password);
    try {
        $stmtUsersInsert->execute();
    } catch (PDOException $e) {
        return "Erreur lors de la mise à jour des données de connexion : " . $e->getMessage();
    }
    $querysql = "UPDATE users SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, email = :email WHERE id = :id";
    $stmtUserData = $bdd->prepare($querysql);
    $stmtUserData->bindParam(":id", $id);
    $stmtUserData->bindParam(":nom", $nom);
    $stmtUserData->bindParam(":prenom", $prenom);
    $stmtUserData->bindParam(":email", $email);
    $stmtUserData->bindParam(":date_naissance", $date_naissance);
    try {
        $stmtUserData->execute();
        return true;
    } catch (PDOException $e) {
        return "Une erreur s'est produite avec l'update : " . $e->getMessage();
    }
}

// Fonction suppression de compte utilisateur
function drop($id, $id2) {
    global $bdd;
    $sql = "DELETE FROM users WHERE id = :id";
    $stmtUserData = $bdd->prepare($sql);
    $stmtUserData->bindParam(":id", $id);
    try {
        $stmtUserData->execute();
    } catch (PDOException $e) {
        return "Erreur lors de la suppression du compte utilisateur : " . $e->getMessage();
    }
}

// Fonction de déconnexion
function logout() {
    session_destroy();
}

// Fonction de récupération des utilisateurs
function getUsers() {
    global $bdd;
    $sql = "SELECT * FROM users";
    $stmt = $bdd->prepare($sql);
    try {
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

// Fonction de récupération des articles
function getArticles() {
    global $bdd;
    $sql = "SELECT * FROM media";
    $stmt = $bdd->prepare($sql);
    try {
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

/* Function Admin update user
function updateUser($id, $username, $email) {
    global $bdd;

    $sql = "UPDATE users SET username = :username, email = :email WHERE ID = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);

    try {
        $stmt->execute();
        return "User updated successfully.";
    } catch (PDOException $e) {
        return "Error updating user: " . $e->getMessage();
    }
}

// Function Admin delete user
function deleteUser($id) {
    global $bdd;

    $sql = "DELETE FROM users WHERE ID = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        return "User deleted successfully.";
    } catch (PDOException $e) {
        return "Error deleting user: " . $e->getMessage();
    }
}*/
?>