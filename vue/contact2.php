<?php
$title = "Contact2";
include('header.php');
//Si l'utilisateur a rentré ses données
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['message'])) {
    ?>
    <!-- Validation -->
    <section class="contact">
        <h2>Commande faite.</h2>
        <p>Votre demande a été envoyé !</p>
            
    </section>
    <?php
} else {
    header("Location: ../vue/contact.php?champs=nonremplis");
}

?>