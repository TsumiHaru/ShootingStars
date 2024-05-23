<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=shootingstars;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>