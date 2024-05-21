<?php
$title = "Page d'accueil";
include('header.php');
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");
//Si l'utilisateur est connecté

?>
<!-- Articles -->
<section class="accueil">
    <section class="screen">
    <?php
    global $bdd;
    $reponse = $bdd->query('SELECT * FROM media');
    while ($donnees = $reponse->fetch()) {
    ?>
        
    <?php

    // Recuperer les articles de la base de données et les afficher
    $articles = getArticles();

    foreach ($articles as $article) {
        // Affiche les articles
        echo "<div class='article'>";
        echo "<h4>" . $article['article_title'] . "</h4>";
        echo "<a href=' /shootingstars/vue/article.php?'>";
        echo "<img src='" . $article['article_img1'] . "' alt='Article Image'>";
        echo "</a>";
        echo "</div>";
        
    }
} 
?>
    </section>
</section>
<?php
    //Sinon on le renvoi a la page de connexion
 


?>
<?php
