<?php
session_start();
session_destroy(); // Détruit toutes les sessions
header("Location: ../Admin/compteAdmin.php"); // Redirige vers la page de connexion
exit();
