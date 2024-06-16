<?php
require '../connect_database/connect.php';

// recuperation en base données
$reqSql = "SELECT * FROM panier";
$exe = $conn->query($reqSql);
// Récupère les résultats de la requête dans un tableau
$CommandeArticles = $exe->fetchAll(PDO::FETCH_ASSOC);


var_dump($CommandeArticles);