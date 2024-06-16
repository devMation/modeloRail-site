<?php
require '../Boostrap/boostrap.php';
?>



<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .encadrement {
        background: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    h1 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    label {
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #ffc107;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
    }

    input[type="submit"]:hover {
        background-color: #e0a800;
    }

    .btn-warning {
        background-color: #ffc107;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        margin: 20px;
        cursor: pointer;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .text-center {
        text-align: center;
    }

    @media (max-width: 768px) {
        .encadrement {
            padding: 10px;
            margin: 10px;
        }

        h1 {
            font-size: 1.5rem;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 8px;
        }

        input[type="submit"] {
            padding: 8px;
        }

        .btn-warning {
            padding: 8px 16px;
            margin: 10px;
        }
    }
    </style>
</head>

<body>
    <?= require '../Boostrap/headerNav.php' ?>
    <a class="btn btn-warning m-3" href="../Accueil/accueil.php" role="button">Retour</a>


    <div class="encadrement">
        <form action="./trait.php" method="post" class="d-flex flex-column mb-2 w-50 mx-auto " style="margin-top: 6%;">

            <h1 class="text-center">Ajouter un article</h1>

            <label for=" nomArticle">Nom de l'article</label>
            <input type="text" name="nom" id="nomArticle">
            <label for="description">Description de l'article</label>
            <textarea name="description" id="description" rows="8"></textarea>
            <label for=" prix">Prix € TTC</label>
            <input type="number" name="prix" id="prix" class="w-25">
            <label for="picture">Image</label>
            <input type="text" name="image" id="picture">
            <input type="submit" value="Ajouter" class="w-75 mx-auto m-4">
        </form>
    </div>
    </div>
    <?= require '../Boostrap/footerAccueil.php'?>
</body>

</html>