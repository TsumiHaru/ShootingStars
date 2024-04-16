<?php
$title = "Page d'inscription";
include('header.php');
?>
    <section class="inscription">
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <h2>Page d'inscription</h2>
                                <!-- Si un message d'erreur ou de confirmation est envoyé par le controller, on l'affiche -->
                                <?php if(isset($_GET['message'])){ echo $_GET['message'];}  ?>
                                <?php if(isset($_GET['error'])){ 
                                    ?> <p class="alert alert-danger">Une erreur s'est produite</p>
                                <?php }  ?>
                                <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/ShootingStars/controller/userController.php">
                                
                                    <div>
                                        <label class="form-label" for="">Nom</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="nom" type="text" id="nom" class="form-control form-control-lg"  value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['nom'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label class="form-label" for="">Prénom</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="prenom" type="text" id="prenom" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['prenom'];}?>"/><br>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Date de naissance</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="dateDeNaissance" type="date" id="dateDeNaissance" class="form-control form-control-lg"  value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['date_naissance'];}?>"/><br>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Email</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="email" type="text" id="email" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['email'];}?>"/><br>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Nom d'utilisateur</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="username" type="text" id="user" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user']['username'])){ echo $_SESSION['user']['username'];}?>"/><br>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Mot de passe</label><br>
                                        <input name="password1" type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Réécrivez votre mot de passe</label><br>
                                        <input name="password2" type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>   
                                    <!-- Si l'utilisateur est connecté, il peut modifier ses données, sinon il aura le formulaire d'inscription -->
                                    <?php if(isset($_SESSION['user'])){?>                                 
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="bEditUserData">Modifier</button>
                                    <?php }else{?>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="bInscription">S'inscrire</button>
                                   <?php }
                                    ?>
                                    <div>
                                        <p class="">Déjà un compte? <a href="pconnexion.php" class="">Connectez-vous</a>
                                        </p>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
<?php

?>