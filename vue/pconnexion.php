<?php
$title = "Connexion";
include('header.php');
?>
<section class="connexion">
    <div class="">
        <div class="">
            <div class="">
                <div class="" style="border-radius: 1rem;">
                    <div class="">

                        <div class="">
                            <h2 class=""><?php echo $title; ?></h2>
                            <?php if(isset($_GET['success'])){ echo "<p class='alert alert-success'>Votre inscription s'est correctement déroulée</p>";}  ?>
                            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/ShootingStars/controller/userController.php">
                                <div class="">
                                    <label class="" for="login">Identifiant</label><br>
                                    <input name="login" type="text" id="login" class="form-control form-control-lg">
                                </div>

                                <div class="">
                                    <label class="" for="password">Mot de passe</label><br>
                                    <input name="password" type="password" id="psw" /> <br>
                                </div>

                                <button class="" type="submit" name="bConnexion">Connexion</button>
                            </form>
                        </div>

                        <div>
                            <p class="">Pas de compte? <a href="pinscription.php" class="">Inscrivez-vous</a>
                            </p>
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