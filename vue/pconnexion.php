<?php
$title = "Connexion";
include('header.php');

if (isset($_SESSION['user'])) {
    echo "<section class='connexion'><h2>Vous êtes déjà connecté</h2></section>";
}else {
?>
<section class="connexion">
    <div>
        <div>
            <div>
                <div style="border-radius: 1rem;">
                    <div>
                        <div>
                            <h2><?php echo $title; ?></h2>
                            <?php if(isset($_GET['success'])){ echo "<p class='alert alert-success'>Votre inscription s'est correctement déroulée</p>";}  ?>
                            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/ShootingStars/controller/userController.php">
                                <div>
                                    <label class="" for="username">Identifiant</label><br>
                                    <input require name="username" type="text" id="username" class="form-control form-control-lg">
                                </div>

                                <div>
                                    <label for="password">Mot de passe</label><br>
                                    <input require name="password" type="password" id="psw" /> <br>
                                </div>

                                <button type="submit" name="bConnexion">Connexion</button>
                            </form>
                        </div>
                        <div>
                            <p>Pas de compte? 
                                <a href="pinscription.php">Inscrivez-vous</a>
                            </p>
                            <p>Mot de passe oublié?
                                <a href="pmdp.php">Cliquez ici</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>