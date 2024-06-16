<?php
require_once '../Boostrap/boostrap.php';
require_once '../connect_database/connect.php';
require_once '../Boostrap/headerNav.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $req = $conn->prepare("SELECT * FROM produit WHERE id = ?");
    $req->execute([$id]);
    $article = $req->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        // Handle the case where the article is not found
        echo "Article not found.";
        exit;
    }
} else {
    // Handle the case where ID is not provided
    echo "No article ID provided.";
    exit;
}
?>


<head>
    <style>
    /* Style de base pour le body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    /* Style pour la section de l'article */
    section {
        background-color: white;
        width: 70%;
        margin: 4% auto;
        border: 1px solid red;
        padding: 20px;
        border-radius: 8px;
    }

    /* Style pour les images et les conteneurs */
    .container {
        max-width: 1200px;
        padding: 0 15px;
        margin: 0 auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-md-6 {
        padding: 15px;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .display-5 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .fs-5 {
        font-size: 1.25rem;
        margin-bottom: 15px;
    }

    .lead {
        font-size: 1.125rem;
        margin-bottom: 20px;
    }

    .d-flex {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-control {
        max-width: 60px;
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
    }

    /* Style pour les tailles d'écran moyenne (tablettes) */
    @media (max-width: 768px) {
        section {
            width: 90%;
        }

        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .display-5 {
            font-size: 2rem;
        }

        .fs-5 {
            font-size: 1.125rem;
        }

        .lead {
            font-size: 1rem;
        }

        .d-flex {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-control {
            margin-bottom: 10px;
            width: 100%;
        }

        .btn {
            width: 100%;
        }
    }

    /* Style pour les petites tailles d'écran (mobiles) */
    @media (max-width: 576px) {
        section {
            width: 100%;
            margin: 2% auto;
            padding: 10px;
        }

        .display-5 {
            font-size: 1.75rem;
        }

        .fs-5 {
            font-size: 1rem;
        }

        .lead {
            font-size: 0.875rem;
        }

        .d-flex {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-control {
            margin-bottom: 10px;
            width: 100%;
        }

        .btn {
            width: 100%;
        }
    }
    </style>
</head>
<section class="py-5 mx-auto border border-danger m-4 " style="background-color: white; width: 70%; ">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="<?= htmlspecialchars($article['image']) ?>" class="img-fluid rounded-start"
                    alt="<?= htmlspecialchars($article['nom']) ?>"></div>
            <div class="col-md-6">
                <h5 class="display-5 fw-bolder"><?= htmlspecialchars($article['nom']) ?></h5>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$45.00</span>
                    <span>Prix <?= htmlspecialchars($article['prix']) ?>€</span>
                </div>
                <p class="lead"><?= htmlspecialchars($article['description']) ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" name="quantity" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                    <button class="btn btn-outline-success flex-shrink-0 mx-auto" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Commander
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require '../Boostrap/footerAccueil.php'; ?>