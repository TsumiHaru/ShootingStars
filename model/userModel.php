<?php
include($_SERVER['DOCUMENT_ROOT']."/ShootingStars/model/dbconnect.php");

//Fonction insertion de données
function insertData($nom,$prenom,$email,$dateDeNaissance,$adresse,$username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    $role = 0;
    //on prépare la requete pour l'insertion des données personnels de l'utilisateur
    $querysql = "INSERT INTO users_data (nom,prenom,date_naissance,email,adresse) VALUES (:nom,:prenom,:date_naissance,:email,:adresse)";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":nom",$nom);
    $stmtUserData->bindParam(":prenom",$prenom);
    $stmtUserData->bindParam(":email",$email);
    $stmtUserData->bindParam(":adresse",$adresse);
    $stmtUserData->bindParam(":date_naissance",$dateDeNaissance);
    //Exécuter la requête SQL
    try{
        $stmtUserData->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite dans l'insertion.";
    }

    if(isset($message)){return $message;}
    //On récupère le dernier enregistrement
    $sqlLastUser = "SELECT id FROM users_data ORDER BY id DESC LIMIT 1";
    $stmtUsers = $bdd->prepare($sqlLastUser);
    $stmtUsers->execute();
    // On récupère l'id du dernier enregistrement
    $idUsers = $stmtUsers->fetchColumn();

    //On prépare la requete pour insèrer les données de connexion de l'utilisateur
    $querysqlData = "INSERT INTO users (username,password,role,users_data_id) VALUES (:username,:password,:role,:users_data_id)";
    //Prépare la requête SQL
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":username",$username);
    $stmtUsersInsert->bindParam(":password",$password);
    $stmtUsersInsert->bindParam(":role",$role);
    $stmtUsersInsert->bindParam(":users_data_id",$idUsers, PDO::PARAM_INT);
    
    try{
       $stmtUsersInsert->execute();
    }catch(PDOException $e){
        $message = "Erreur 2";
    }
    // Si on on récupère un message d'erreur, on le retourne
    if(isset($message)){return $message;}
}

// Fonction de vérification avant connexion
function login($username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Préparation de la requete qui permet de vérifier si l'utilisateur correspond à un utilisateur de base de données grâce a son username et password (vérification en bdd)
    $sqlUser = "SELECT * FROM `users`  join users_data where users.users_data_id = users_data.id AND username= :username AND password= :password";
    $stmtUsers = $bdd->prepare($sqlUser);
    $stmtUsers->bindParam(":username",$username);
    $stmtUsers->bindParam(":password",$password);
    try{
        $stmtUsers->execute();
     }catch(PDOException $e){
         $message = "Erreur 2";
     }
     //On récupère les données de la base de données dans un tableau
     $user = $stmtUsers->fetch();
     //On stock le tableau dans une variable session
     $_SESSION['user'] = $user;
}

// Fonction update, qui permet de mettre a jour les données en base de données
function update($id,$nom,$prenom,$email,$dateDeNaissance,$adresse,$username,$password){
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
    $querysql = "UPDATE users_data SET nom = :nom,prenom= :prenom,date_naissance =:date_naissance, email = :email,adresse = :adresse WHERE id = :userId";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":userId",$userId);
    $stmtUserData->bindParam(":nom",$nom);
    $stmtUserData->bindParam(":prenom",$prenom);
    $stmtUserData->bindParam(":email",$email);
    $stmtUserData->bindParam(":adresse",$adresse);
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
?>