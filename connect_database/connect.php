<?php

/**
 * Connexion à la database avec PDO
 * PDO => c'est une extension qui permet de fournir une interface pour acceder au database
 * de maniere sécurises.
 */
try {
    $conn = new PDO("mysql:host=localhost;dbname=modeloRail;", "root", "");
    // echo "Vous etes conneter";
} catch (\PDOException $e) {
    echo "Error de connexion" . $e->getMessage();
}