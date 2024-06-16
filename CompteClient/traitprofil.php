<?php
// session_start();
// require_once '../redirect/redirect_if_not_logged_in.php';

require '../connect_database/connect.php';


// Assurez-vous que $userId (ou $pseudo) contient l'identifiant (ou le pseudo) de l'utilisateur que vous souhaitez afficher
// Exemple : ID de l'utilisateur

// Récupérer l'identifiant de l'utilisateur depuis l'URL


// Requête SQL pour récupérer les informations de l'utilisateur en fonction de son identifiant
$reqSql = "SELECT * FROM user";
$statement = $conn->prepare($reqSql);
$statement->execute();

// Récupérer les résultats de la requête dans un tableau associatif
$user = $statement->fetchAll(PDO::FETCH_ASSOC);