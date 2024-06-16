<?php
require '../connect_database/connect.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];
    // var_dump($nom, $description, $prix, $image, $id);
}

// je regard si mon id nest pas null
if (isset($_POST['id'])) {
    // et je la stoke dans une variables id
    $id = $_POST['id'];
}

$req = $conn->prepare("UPDATE produit
SET nom = ?, description = ?, prix = ?,  image = ?
WHERE id = ?");

$req->execute([$nom, $description, $prix, $image, $id]);





header("Location: ../Display/display.php");