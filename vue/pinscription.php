<?php
$title = "Page d'inscription";
include('header.php');
?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase padB">Page d'inscription</h2>
                                <!-- Si un message d'erreur ou de confirmation est envoyé par le controller, on l'affiche -->
                                <?php if(isset($_GET['message'])){ echo $_GET['message'];}  ?>
                                <?php if(isset($_GET['error'])){ 
                                    ?> <p class="alert alert-danger">Une erreur s'est produite</p>
                                <?php }  ?>
                                <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/ShootingStars/controller/userController.php">
                                
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Nom</label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="nom" type="text" id="nom" class="form-control form-control-lg"  value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['nom'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Prénom</label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="prenom" type="text" id="prenom" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['prenom'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Adresse </label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="adresse" type="text" id="adresse" class="form-control form-control-lg"value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['adresse'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Date de naissance</label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="dateDeNaissance" type="date" id="dateDeNaissance" class="form-control form-control-lg"  value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['date_naissance'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Email</label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="email" type="text" id="email" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['email'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="">Nom d'utilisateur</label>
                                        <!-- Value permet d'afficher les données de l'utilisateur si il est -->
                                        <input name="username" type="text" id="user" class="form-control form-control-lg" value="<?php if(isset($_SESSION['user']['username'])){ echo $_SESSION['user']['username'];}?>"/>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Mot de passe</label>
                                        <input name="password1" type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Réécrivez votre mot de passe</label>
                                        <input name="password2" type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>   
                                    <!-- Si l'utilisateur est connecté, il peut modifier ses données, sinon il aura le formulaire d'inscription -->
                                    <?php if(isset($_SESSION['user'])){?>                                 
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="bEditUserData">Modifier</button>
                                    <?php }else{?>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="bInscription">S'inscrire</button>
                                   <?php }
                                    ?>
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