<?php
$title = "Connexion";
include('header.php');

if ($_SESSION['user']) {
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
                                    <label class="" for="login">Identifiant</label><br>
                                    <input name="login" type="text" id="login" class="form-control form-control-lg">
                                </div>

                                <div>
                                    <label for="password">Mot de passe</label><br>
                                    <input name="password" type="password" id="psw" /> <br>
                                </div>

                                <button type="submit" name="bConnexion">Connexion</button>
                            </form>
                        </div>

                        <div>
                            < class="">Pas de compte? <a href="pinscription.php">Inscrivez-vous</a>
                            </>
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