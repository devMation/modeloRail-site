<?php
require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php';
require '../AjoutPanier/getTrait.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        padding: 20px;
    }

    .card {
        margin: 20px 0;
    }

    .card-header {
        background-color: #28a745;
        color: white;
        text-align: center;
    }

    .card-body {
        background-color: #fff;
    }

    .card-footer {
        background-color: #f8f9fa;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .card {
            margin: 10px 0;
        }

        .card-header {
            font-size: 1.2rem;
        }

        .card-body {
            font-size: 0.9rem;
        }

        .card-footer {
            text-align: center;
        }

        .btn-success {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
        }
    }
</style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Votre Panier</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Total des articles: 3</p>
                        <p class="card-text">Montant total: 75,00 €</p>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-success">Valider mon panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require '../Boostrap/footerAccueil.php';
    ?>
</body>

</html>