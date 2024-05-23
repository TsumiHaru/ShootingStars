<?php
$title = "Article";
include('header.php');
require($_SERVER['DOCUMENT_ROOT'] . "/shootingstars/model/userModel.php");
?>
<!-- Articles -->
<section class="screen">
<section class="article_page">
<?php
global $bdd;

if (isset($_GET['id'])) {
    $articleId = intval($_GET['id']); // Securisé l'id
    $query = $bdd->prepare('SELECT * FROM media WHERE ID = ?');
    $query->execute([$articleId]);
    $article = $query->fetch();
    if ($article) {
        // Affichage de l'article
        echo "<img src='" . htmlspecialchars($article['article_img1']) . "' alt='Article Image'>";
        echo "<h4>" . htmlspecialchars($article['article_title']) . "</h4>";
        echo "<div class='article_page_seconde'>";
        echo "<p>" . htmlspecialchars($article['article_text']) . "</p>";
        echo "<img src='" . htmlspecialchars($article['article_img2']) . "' alt='Article Image'>";
        echo "</div>";
    } else {
        echo "Article non trouver.";
    }
} else {
    echo "Pas d'id specifié.";
}
?>
</section>
</section>
