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
                                    ?> <p>Une erreur s'est produite</p>
                                <?php } 
                                var_dump($_SESSION['user']);
                                ?>
                                <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/ShootingStars/controller/userController.php">
                                
                                    <div>
                                        <label for="">Nom</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="nom" type="text" id="nom"   value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['nom'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label for="">Prénom</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="prenom" type="text" id="prenom" " value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['prenom'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label class="form-label" for="">Date de naissance</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="dateDeNaissance" type="date" id="dateDeNaissance"   value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['date_naissance'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label class="form-label" for="">Email</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="email" type="text" id="email" " value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['email'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label class="form-label" for="">Nom d'utilisateur</label><br>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="username" type="text" id="user"  value="<?php if(isset($_SESSION['user']['username'])){ echo $_SESSION['user']['username'];}?>"/><br>
                                    </div>
                                    <div>
                                        <label  for="typePasswordX">Mot de passe</label><br>
                                        <input name="password1" type="password" id="typePasswordX"  />
                                    </div>
                                    <div>
                                        <label  for="typePasswordX">Réécrivez votre mot de passe</label><br>
                                        <input name="password2" type="password" id="typePasswordX"  />
                                    </div>   
                                    <!-- Si l'utilisateur est connecté, il peut modifier ses données, sinon il aura le formulaire d'inscription -->
                                    <?php if(isset($_SESSION['user'])){?>                                 
                                        <button  type="submit" name="bEditUserData">Modifier</button>
                                    <?php }else{?>
                                        <button type="submit" name="bInscription">S'inscrire</button>
                                   <?php }
                                    ?>
                                    <div>
                                        <p>Déjà un compte? <a href="pconnexion.php">Connectez-vous</a>
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