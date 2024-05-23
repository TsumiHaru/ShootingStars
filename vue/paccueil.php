<?php
$title = "Page d'accueil";
include('header.php');
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");
?>
    <!-- Articles -->
<section class="accueil">
    <section class="screen">
    <?php
   global $bdd;
   $reponse = $bdd->query('SELECT * FROM media');
   $mediaEntries = [];
   while ($donnees = $reponse->fetch()) {
       $mediaEntries[] = $donnees;
   }
   $articles = getArticles();
   foreach ($articles as $article) {
       echo "<div class='article'>";
       echo "<h4>" . htmlspecialchars($article['article_title']) . "</h4>";
       echo "<a href='/shootingstars/vue/article.php?id=" . urlencode($article['ID']) . "'>";
       echo "<img src='" . htmlspecialchars($article['article_img1']) . "' alt='Article Image'>";
       echo "</a>";
       echo "</div>";
   }
?>
    </section>
</section>
<?php
