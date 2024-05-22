<?php
include($_SERVER['DOCUMENT_ROOT']."/ShootingStars/model/dbconnect.php");


//Fonction insertion de données
function insertData($username,$password,$nom,$prenom,$email,$dateDeNaissance){
    //Récupération de la connexion à la BDD
    global $bdd;
    $role = 0;
    //on prépare la requete pour l'insertion des données personnels de l'utilisateur
    $querysql = "INSERT INTO users (username,password,nom,prenom,email,date_naissance,) VALUES (:username,:password:nom,:prenom,:email,:date_naissance,)";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":username",$username);
    $stmtUserData->bindParam(":password",$password);
    $stmtUserData->bindParam(":nom",$nom);
    $stmtUserData->bindParam(":prenom",$prenom);
    $stmtUserData->bindParam(":email",$email);
    $stmtUserData->bindParam(":date_naissance",$dateDeNaissance);
    //Exécuter la requête SQL
    try{
        $stmtUserData->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite dans l'insertion.";
    }
    if(isset($message)){return $message;}
    //On récupère le dernier enregistrement
    $sqlLastUser = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
    $stmtUsers = $bdd->prepare($sqlLastUser);
    $stmtUsers->execute();
    // On récupère l'id du dernier enregistrement
    $idUsers = $stmtUsers->fetchColumn();
    //On prépare la requete pour insèrer les données de connexion de l'utilisateur
    $querysqlData = "INSERT INTO users (username,password,role) VALUES (:username,:password,:role)";
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":username",$username);
    $stmtUsersInsert->bindParam(":password",$password);
    $stmtUsersInsert->bindParam(":role",$role);
    try{
       $stmtUsersInsert->execute();
    }catch(PDOException $e){
        $message = "Erreur 2";
    }
    // Si on on récupère un message d'erreur, on le retourne
    if(isset($message)){return $message;}
}


// Fonction de connexion
function login($username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Préparation de la requete qui permet de vérifier si l'utilisateur correspond à un utilisateur de base de données grâce a son username et password (vérification en bdd)
    $sqlUser = "SELECT * FROM users  where  username= :username";
    $stmtUsers = $bdd->prepare($sqlUser);
    $stmtUsers->bindParam(":username",$username);
    try{
        $stmtUsers->execute();
     }catch(PDOException $e){
         $message = "Erreur de connexion";
     }
     if(isset($message)){return $message;}

     //On récupère les données de la base de données dans un tableau
     $user = $stmtUsers->fetch();

        //On vérifie si le mot de passe correspond
    if (password_verify($password,$user['password'])){
        $_SESSION['user'] = $user;
        header("Location: ../vue/paccueil.phplogin=success");
    }else{
        $message = "Mot de passe non vérifié";
        header("Location: ../vue/pconnexion.php?message=".$message);
    }
}


// Fonction update
function update($id,$nom,$prenom,$email,$dateDeNaissance,$username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    //On prépare la requete qui permet de modifier les données de connexion de l'utilisateur
    $querysqlData = "UPDATE users SET username= :username,password= :password WHERE id = :id";
    //Prépare la requête SQL
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":id",$id);
    $stmtUsersInsert->bindParam(":username",$username);
    $stmtUsersInsert->bindParam(":password",$password);
    
    try{
       $stmtUsersInsert->execute();
    }catch(PDOException $e){
        $message = "Erreur 1";
    }
    
    //On récupère l'id de la session de l'utilisateur
    $userId = $_SESSION['user']['id'];
    //On prépare la requete qui permet de modifier les données personnelles de l'utilisateur
    $querysql = "UPDATE users SET nom = :nom,prenom= :prenom,date_naissance =:date_naissance, email = :email WHERE id = :userId";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":userId",$userId);
    $stmtUserData->bindParam(":nom",$nom);
    $stmtUserData->bindParam(":prenom",$prenom);
    $stmtUserData->bindParam(":email",$email);
    $stmtUserData->bindParam(":date_naissance",$dateDeNaissance);
    //Exécuter la requête SQL
    try{
        $stmtUserData->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite avec l'update.";
    }
    //Si la variable message n'existe pas c'est que tout s'est bien passé, sinon on renvoi faux
    if(!isset($message)){
        return true;
    }
    return false;
}

// La fonction suppression de compte utilisateur
function drop($id,$id2){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Suppression de l'utilisateur via son id
    $sql = "DELETE FROM users WHERE id= :id";
    $stmtUserData = $bdd->prepare($sql);
    $stmtUserData->bindParam(":id",$id);
    $stmtUserData->execute();
    // Suppression des données personnelles de l'utilisateur via son id
    $sql2 = "DELETE FROM users_data where id= :idUser";
    $stmtUserData2 = $bdd->prepare($sql2);
    $stmtUserData2->bindParam(":idUser",$id2);
    $stmtUserData2->execute();

    return true;
}

// Fonction qui permet de déconnecter l'utilisateur (supprime les données qui sont stockées en session)
function logout(){
   session_destroy();
}


// Fonction qui permet de récupérer les utilisateurs
function getUsers(){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Préparation de la requete qui permet de récupérer les utilisateurs
    $sql = "SELECT * FROM users_data";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    //On récupère les données de la base de données dans un tableau
    $users = $stmt->fetchAll();
    //On retourne les données
    return $users;
}


// Fonction qui permet de récupérer les articles
function getArticles(){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Préparation de la requete qui permet de récupérer les articles
    $sql = "SELECT * FROM media";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    //On récupère les données de la base de données dans un tableau
    $articles = $stmt->fetchAll();
    //On retourne les données
    return $articles;
}


?>