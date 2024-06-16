<?php
session_start(); // Démarrer la session au tout début

require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php';
require '../connect_database/connect.php';
// require '..scriptConnexion.php';

$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if ($email != "" && $password != "") {
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        $req = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($req && $req['id'] != false) {
            $_SESSION['user'] = $req; // Utiliser un sous-tableau pour éviter de remplacer $_SESSION
            header("Location: ../CompteClient/dash.php");
            exit(); // Toujours appeler exit après une redirection
        } else {
            $errorMsg = "Email ou mot de passe incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <div class="container" style="margin: 8% auto;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Connexion au Compte
                    </div>
                    <div class="card-body">
                        <form method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="email">Adresse Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Entrez votre email" required>
                                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre
                                    adresse email avec personne d'autre.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Mot de passe" required>
                            </div>
                            <label for="connect">
                                <input type="checkbox" name="connect" id="connect" checked> connexion automatique
                            </label>

                            <div class="form-check">
                                <a href="../InscriptionUser/inscription.php">Vous n'avez pas de compte ? Créez-en un</a>
                            </div>
                            <button type="submit" class="btn btn-warning mt-3">Connexion</button>
                        </form>
                        <?php if ($errorMsg) : ?>
                        <p class="bg-danger p-3 m-2 text-white"><?php echo $errorMsg; ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= require '../Boostrap/footerAccueil.php' ?>
    <script>
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^.{7,}$/;

        if (!emailRegex.test(email)) {
            alert('Veuillez entrer une adresse email valide.');
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert('Le mot de passe doit contenir au moins 7 caractères.');
            return false;
        }

        return true;
    }
    </script>
</body>

</html>