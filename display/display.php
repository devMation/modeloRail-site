<?php
require '../display/trait.php';
require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php';

?>

<head>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    #container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 1rem;
    }

    .card {
        width: 100%;
        max-width: 18rem;
        margin: 1rem;
    }

    .card img {
        width: 100%;
        height: auto;
    }

    .card-body {
        text-align: center;
    }

    .btn {
        display: block;
        margin: 0.5rem auto;
        width: 80%;
    }

    /* Responsive styles */
    @media (min-width: 576px) {
        .card {
            max-width: 16rem;
        }

        .btn {
            width: 70%;
        }
    }

    @media (min-width: 768px) {
        .card {
            max-width: 14rem;
        }

        .btn {
            width: 60%;
        }
    }

    @media (min-width: 992px) {
        .card {
            max-width: 12rem;
        }

        .btn {
            width: 50%;
        }
    }

    @media (min-width: 1200px) {
        .card {
            max-width: 18rem;
        }

        .btn {
            width: 40%;
        }
    }
    </style>
</head>

<body>

    <a class="btn btn-warning m-3" href="../Ajout/ajoutArticles.php" role="button">Retour</a>

    <div id="container" class="flex-wrap d-flex">
        <?php
        foreach ($articles as $article) {
            echo "
        <div class='card shadow p-3 m-5 bg-body-tertiary rounded ' style='width: 18rem;'>
        <h5 class='text-center'>Maquette</h5>
            <img src='" . $article['image'] . "' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title '>" . $article['nom'] . "</h5>
                <p class='card-text'>" . $article['description'] . "</p>
                <p class='card-text'>" . $article['prix'] . " €</p>
               
                <a href='../update/update.php?id={$article['id']}' class='btn btn-warning p-2'>Update</a>
                <a href='../delete/delete.php?id={$article['id']}' class='btn btn-warning p-2'>Delete</a>
               
            </div>
        </div>";
        }
        ?>
    </div>



    <?php require '../Boostrap/footerAccueil.php'; ?>

</body>

</html>