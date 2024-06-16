<?php


session_start();

// Détruire toutes les variables de session
$_SESSION = array();


session_destroy();
header("Location: ../CompteClient/connexion.php");
