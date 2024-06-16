<?php
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';
require '../display/trait.php';
// je stock mais donner dans des variables

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // $id = $_POST['id'];
  $nom = !empty($_POST['nom']) ? $_POST['nom'] : '';
  $description = !empty($_POST['description']) ? $_POST['description'] : '';
  $prix = !empty($_POST['prix']) ? $_POST['prix'] : '';
  $image = !empty($_POST['image']) ? $_POST['image'] : '';
}
// Préparation de la requête d'insertion
$prep = $conn->prepare("INSERT INTO produit (nom, description, prix, image) VALUES (?, ?, ?, ?)");

// Exécution de la requête avec les valeurs en paramètres
$prep->execute([$nom, $description, $prix, $image]);


header('location: ../display/display.php');













// je les recupere bien
// var_dump($nom);
// var_dump($description);
// var_dump($prix);
// var_dump($image);