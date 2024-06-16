<?php
require '../Boostrap/boostrap.php';
require '../connect_database/connect.php';

// Récupération des commentaires
$reqSql = "SELECT * FROM commentaire";
$exe = $conn->query($reqSql);
$messages = $exe->fetchAll(PDO::FETCH_ASSOC);

// Suppression des commentaires
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $req = $conn->prepare("DELETE FROM commentaire WHERE id = ?");
    $req->execute([$id]);
    header('location: ../blogFeroPassion/commentaire.php');
    exit();
}
?>

<style>
.main-container {
    margin: 0 auto;
    padding: 2rem;
}

.comments-list {
    list-style-type: none;
    padding-left: 0;
}

.comment {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    position: relative;
}

.comment .meta {
    font-size: 0.9rem;
    color: #888;
}

.comment .content {
    margin-top: 10px;
}

.comment a {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #888;
    text-decoration: none;
}
</style>
<title>Espace Commentaire Modélorail</title>
</head>

<body>
    <?php require '../Boostrap/headerNav.php'; ?>
    <div class="main-container container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">Espace Commentaire Modélorail</h2>
                <form action="postCommentaire.php" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="pseudo" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">Commentaire</label>
                        <textarea class="form-control" id="message" name="commentaire" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un Commentaire</button>
                </form>

                <hr>

                <!-- Comment list -->
                <h3>Commentaires des passionnés <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAACXBIWXMAAAsTAAALEwEAmpwYAAACn0lEQVR4nO1YuW4UQRB9JgESRyABfwHCBokMkSMsUn6AyNjkSA5tjIGAzN/CsUJmiQxGSGyy3i7vmtBcAhHwUJkaa7aZq3sGa7HmSSWNqut4qq6+BmjRokUjEOK1I17hf4EQVMEkwxEvhej4hNP6iYIQHSFe2HfXERu+vsWho0+ccMSaELtJH8VKyConMWW9mhfvbaajka1FNEV4I5CwFMT6kOmYVNYRM1WTNbUdCbFs/usp3brxudd4wrr+Q+KK+b9LdI54r7oBcbFSQj1xQnq1DuE+ccb891LxPqluRJyuSrhSvzZBmMRUXjwdCyKcl6RJwlHxGiA8sjaZ9VvKjbdOnv7QCa82tS1KlT29LmE9eIz0fqWbFIQQjgpWEjumKH/dkzMId5s60aQZwuO2dVf5USPczZqNPH0O4XHbf0k4FkGLbhIggbtE6V2iRD4K8bhHTHt5guNWJVy6S1QRR2wOiVN14oaXPxB6YdkhzguxZaTf5N66ClBGuHDFxkArq2TlT+KtIXEh9/YVSjhldFOf1o74qiLEcyHmYu21so7YrNlaVzOTO+JhgdNqrH2PmHbEo9gHriN+CbFC4phfKTX4LsS8vgK2ibNC3DGdOt6ItY+BI04KsSTET8v15KCldFpNOe87DogFG3uW6ELt62CHuOaIb1aE2/tKR3xRhVbK/69llVPjz0mQUPv++H+PkSMeqK7quBC3rAh7A+LcAQFN5v/XKiIcYL9W1Odl496sLsFWtz6rF/wpccRdI/A05Rxqv2u6GSEuWeJRwHj6abWtirlkESkJrZKKIxaF+GHkrqcChNqPLNmsEJczCJWNp0/ITpV32bJfyRB7ybZdqTqeC92KdCqTg0C/05WKte+Pv/lU7veI41XHW7Q4avgN4UAW1id+3nwAAAAASUVORK5CYII=">
                </h3>
                <ul class="comments-list">
                    <?php foreach ($messages as $message) : ?>
                    <li class="comment">
                        <a href="../blogFeroPassion/commentaire.php?id=<?= htmlspecialchars($message['id']) ?>"
                            class="text-danger">supprimer</a>
                        <div class="meta">
                            Par <strong><?= htmlspecialchars($message['pseudo']) ?></strong>
                        </div>
                        <div class="content">
                            <?= htmlspecialchars($message['commentaire']) ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php require '../Boostrap/footerAccueil.php'; ?>
</body>

</html>