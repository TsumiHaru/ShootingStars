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
            <a href="article.php" class="box-accueil">
            <h4>The Constellation Aquila - Expedition</h4>
            <img src="/shootingstars/asset/img/aquila1.jpg" alt="">
            </a>
        </article>
        <article>
            <a href="article.php" class="box-accueil">
            <h4>The Terrapin - Tourring</h4>
            <img src="/shootingstars/asset/img/terrapin1.jpg" alt="">
            </a>
        </article>
        <article>
            <a href="article.php" class="box-accueil">
            <h4>The Pledge X1 - Tourring</h4>
            <img src="/shootingstars/asset/img/pledge1.jpg" alt="">
            </a>
        </article>
        <article>
            <a href="article.php" class="box-accueil">
            <h4>The 400I1 - Tourring</h4>
            <img src="/shootingstars/asset/img/400i1.jpg" alt="">
            </a>
        </article>
    </section>
</section>
<?php
    //Sinon on le renvoi a la page de connexion
} else {
    header("Location: ../index.php");
}


?>