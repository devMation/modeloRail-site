<?php

require '../connect_database/connect.php';



if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $req = $conn->prepare("DELETE FROM produit WHERE id = ? LIMIT 1");
    $req->execute([$id]);
    $post = $req->fetch();
    if (empty($post)) {
        header('location: ../display/display.php');
    }
}




// header("location: ../display/display.php");