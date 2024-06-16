<?php
require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateArticle</title>
</head>

<style>
body {
    background: url(../pictures/locomotive141r420_modelisme.jpeg) center/cover fixed;
}


textarea,
input {
    resize: none;
    opacity: 0.9;
    color: black;
}

.encadrement {
    background-color: white;
    width: 50%;
    opacity: 0.8;
    border: 1px solid black;
    border-radius: 20px;
    margin: 4% auto;
}
</style>

<body>
    <a class="btn btn-warning m-3" href="../Ajout/ajoutArticles.php" role="button">Retour</a>

    <div class="encadrement">
        <form action="../update/traitUpdate.php" method="POST" class=" d-flex flex-column mb-2 w-50 mx-auto " style="
            margin-top: 6%;">
            <h1 class="text-center">Modifier un article</h1>
            <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
            <label for=" nomArticle">Nom de l'article</label>
            <input type="text" name="nom" id="nomArticle">
            <label for="description">Description de l'article</label>
            <textarea name="description" id="description" rows="8"></textarea>
            <label for="prix">Prix € TTC</label>
            <input type="number" name="prix" id="prix" class="w-25">
            <label for="picture">Image</label>
            <input type="text" name="image" id="picture">
            <input type="submit" value="Ajouter" class="w-75 mx-auto m-4 btn-warning">
        </form>
    </div>
    </div>
</body>

</html>