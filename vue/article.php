<?php
$title = "Article";
include('header.php');
//Si l'utilisateur est connecté
if ($_SESSION['user']) {
?>
<!-- Articles -->
<section class="article">
    <h2>Article</h2>
    <section class="top-article">
    <img src="" alt="article-img">
    <h4>article-title</h4>
    </section>
    <section class="bottom-article">
        <p>Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!DISCLAIMER: These are our current vehicle specifications. Some of this may change during the 3D design and game balancing process.</p>
        <img src="" alt="article-img-secondary">
    </section>
</section>
<?php
    //Sinon on le renvoi a la page de connexion
} else {
    header("Location: ../index.php");
}


?>