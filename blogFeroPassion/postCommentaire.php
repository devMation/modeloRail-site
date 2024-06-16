<?php
require '../connect_database/connect.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
        $pseudo = $_POST['pseudo'];
        $commentaire = $_POST['commentaire'];

        $req = $conn->prepare("INSERT INTO commentaire (pseudo, commentaire) VALUES (?, ?)");
        $req->execute([$pseudo, $commentaire]);

        header("Location: commentaire.php");
    } else {
        echo 'Veuillez remplir tous les champs.';
    }
}
