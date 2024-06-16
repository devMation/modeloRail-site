<?php
// session_start();
require_once '../redirect/redirect_if_not_logged_in.php';

// si la session n'est pas definit tu me rdire ver le login
if (!isset($_SESSION['user'])) {
    header("Location: ../connexion.php");
    exit();
}

// var_dump($_SESSION['user']); // Affiche les données de session de l'utilisateur
?>

<style>
    body {
        background: url('../pictures/serie8_allemande_ins.jpg') center/cover;
        margin: 0;
        font-family: Arial, sans-serif;
        color: #333;
    }

    #container {
        width: 90%;
        height: auto;
        background-color: rgba(253, 252, 252, 0.5);
        /* Utilisez rgba pour la transparence */
        border: 1px solid black;
        margin: 50px auto;
        backdrop-filter: blur(10px);
        /* Ajoute un effet de flou */
        -webkit-backdrop-filter: blur(10px);
        /* Compatibilité avec les navigateurs WebKit */
    }

    .mainContainer {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        padding: 7%;
    }

    .profil,
    .panier,
    .commander {
        width: 300px;
        height: 300px;
        border-radius: 25px;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        text-shadow: 3px -1px 5px black;
        transition: background-color 0.3s ease;
        margin: 10px;
    }

    .profil {
        background: url('../pictures/profil.jpg') center/cover;
    }

    .profil:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }

    .panier {
        background: url('../pictures/panier-png.png') center/cover;
    }

    .panier:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }

    .commander {
        background-color: blue;
        background: url('../pictures/commander.jpg') center/cover;
    }

    .commander:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }

    @media (max-width: 768px) {
        #container {
            width: 95%;
            padding: 5%;
        }

        .mainContainer {
            flex-direction: column;
            align-items: center;
        }

        .profil,
        .panier,
        .commander {
            width: 80%;
            height: auto;
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        #container {
            width: 100%;
            margin: 20px auto;
        }

        .profil,
        .panier,
        .commander {
            width: 95%;
            height: auto;
            padding: 15px;
        }
    }
</style>
<?php

// echo "Connexion reussit";
require '../Boostrap/boostrap.php';
?>

<?php require '../Boostrap/headerNav.php'; ?>

<div id="container">
    <div class="mainContainer">

        <div class="profil">
            <a href="../CompteClient/profil.php">Votre Profil</a>
        </div>

        <div class="panier">
            <h3>Consulté votre panier</h3>
        </div>
        <div class="commander">
            <h3>Commander</h3>
        </div>
    </div>

</div>

<br>
<br>
<br>
<br>
<br>

<?php
require '../Boostrap/footerAccueil.php';
?>