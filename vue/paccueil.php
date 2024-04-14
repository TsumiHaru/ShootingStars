<?php
$title = "Page d'accueil";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
<!-- Articles -->
<section class="accueil">
    <h2>Catalogue</h2>
    <h3>Presentation site</h3>
    <section class="screen">
        <article>
            <h4>Article 1</h4>
            <p>Contenu de l'article 1</p>
        </article>
        <article>
            <h4>Article 2</h4>
            <p>Contenu de l'article 2</p>
        </article>
        <article>
            <h4>Article 3</h4>
            <p>Contenu de l'article 3</p>
        </article>
    </section>
</section>
<?php
    //Sinon on le renvoi a la page de connexion
} else {
    header("Location: ../index.php");
}


?>