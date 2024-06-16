<?php
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';

 

$reqSql = "SELECT * FROM produit";
$exe = $conn->query($reqSql);
// Récupère les résultats de la requête dans un tableau
$articles = $exe->fetchAll(PDO::FETCH_ASSOC);


 