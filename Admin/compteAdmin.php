<?php
require '../Boostrap/boostrap.php';
require '../Boostrap/headerNav.php';
require '../Admin/scriptAdmin.php';
require '../connect_database/connect.php';

?>

<head>
    <link rel="stylesheet" href="../font/font.css">
    <style>
        /* connexion.css */

        /* Style de base pour tous les écrans */
        h1 {
            font-family: "Kenia-Regular";
        }





        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            background: url('../pictures/mallard.jpg') center/cover;

        }

        .container {
            margin: 8% auto;
            padding: 15px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.5em;
            background-color: #ffc107;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 10px 15px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #fff;
            border-radius: 5px;
            width: 100%;
        }

        /* Styles spécifiques pour les petits écrans */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                margin: 5% auto;
            }

            .card {
                padding: 15px;
            }

            .card-header {
                font-size: 1.2em;
                padding: 10px;
            }

            .card-body {
                padding: 15px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .btn-warning {
                font-size: 1em;
            }
        }

        /* Styles spécifiques pour les très petits écrans */
        @media (max-width: 576px) {
            .container {
                width: 95%;
                margin: 5% auto;
            }

            .card {
                padding: 10px;
            }

            .card-header {
                font-size: 1em;
                padding: 5px;
            }

            .card-body {
                padding: 10px;
            }

            .form-group {
                margin-bottom: 8px;
            }

            .btn-warning {
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="margin: 8% auto;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Connexion Administrateur</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="email">Adresse Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
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
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            var passwordRegex = /^.{7,}$/;

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