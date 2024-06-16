<?php
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php';

if (isset($_POST['ok'])) {

    // Vérification que tous les champs sont remplis
    if (
        !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) &&
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['adresse']) &&
        !empty($_POST['code_postal']) && !empty($_POST['ville']) && !empty($_POST['pays'])
    ) {

        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['password']);
        $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];

        // Vérification des mots de passe
        if ($_POST['password'] != $_POST['passwordConfirm']) {
            $messPassword = "Veuillez saisir les mêmes mots de passe.";
        }

        // Vérification de la longueur du mot de passe et du pseudo
        if (strlen($_POST['password']) < 7) {
            $messPassword = "Votre mot de passe est trop court.";
        } elseif (strlen($_POST['pseudo']) > 30 || strlen($_POST['pseudo']) < 5) {
            $messPassword = "La longueur de votre pseudo est incorrecte.";
        }

        if (!isset($messPassword)) {
            // Vérification de l'unicité de l'email
            $testEmail = $conn->prepare("SELECT * FROM user WHERE email = ?");
            $testEmail->execute(array($email));

            if ($testEmail->rowCount() == 0) {
                // Insertion des données dans la base de données
                $insert = $conn->prepare("INSERT INTO user (pseudo, email, password, passwordConfirm, nom, prenom, age, adresse, code_postal, ville, pays) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insert->execute(array($pseudo, $email, $password, $passwordConfirm, $nom, $prenom, $age, $adresse, $code_postal, $ville, $pays));
                $message = "Votre compte a bien été créé.";
            } else {
                $existCompte = "Cette adresse e-mail est déjà utilisée.";
            }
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="../css/inscription.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (!empty($messPassword)) : ?>
                <p class="text-white text-center bg-danger p-3"><?= $messPassword ?></p>
                <?php endif; ?>

                <div class="form_Inscription">
                    <?php if (isset($existCompte)) : ?>
                    <p class="text-center text-white bg-danger p-3"><?= $existCompte ?></p>
                    <?php endif; ?>
                    <h2 class="text-center mb-4">
                        Inscription au guichet de la vapeur
                    </h2>
                    <form method="POST" id="form_Inscription" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo" id="pseudo"
                                placeholder="Entrez votre pseudo" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez votre nom"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom"
                                placeholder="Entrez votre prénom" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Âge</label>
                            <input type="number" class="form-control" name="age" id="age" placeholder="Entrez votre âge"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Entrez votre email" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse"
                                placeholder="Entrez votre adresse" required>
                        </div>
                        <div class="form-group">
                            <label for="code_postal">Code Postal</label>
                            <input type="text" class="form-control" name="code_postal" id="code_postal"
                                placeholder="Entrez votre code postal" required>
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" name="ville" id="ville"
                                placeholder="Entrez votre ville" required>
                        </div>
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" name="pays" id="pays"
                                placeholder="Entrez votre pays" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirm">Confirmer Mot de passe</label>
                            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                                placeholder="Confirmez votre mot de passe" required>
                        </div>
                        <input type="submit" name="ok" value="Prochain quai " class="w-100 mx-auto m-3" required>
                        <?php if (isset($message)) {
                            echo "<p class='text-white text-center bg-success p-3 btn-warning'>$message</p> <a class='text-center ' href='../CompteClient/connexion.php'>Connecter Vous</a> ";
                        } ?>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php require '../Boostrap/footerAccueil.php' ?>
    <script>
    function validateForm() {
        const pseudo = document.getElementById('pseudo').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('passwordConfirm').value;

        const pseudoRegex = /^[a-zA-Z0-9]{5,30}$/;
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^.{7,}$/;

        if (!pseudoRegex.test(pseudo)) {
            alert('Le pseudo doit être entre 5 et 30 caractères et ne contenir que des lettres et des chiffres.');
            return false;
        }

        if (!emailRegex.test(email)) {
            alert('Veuillez entrer une adresse email valide.');
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert('Le mot de passe doit contenir au moins 7 caractères.');
            return false;
        }

        if (password !== passwordConfirm) {
            alert('Les mots de passe ne correspondent pas.');
            return false;
        }

        return true;
    }
    </script>
</body>