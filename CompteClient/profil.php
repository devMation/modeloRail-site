<?php
// session_start();
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';
require 'traitprofil.php';
require_once '../redirect/redirect_if_not_logged_in.php';


// var_dump($_SESSION);

?>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        margin: 50px auto;
        padding: 15px;
        max-width: 1200px;
    }

    .profil {
        text-align: center;
        font-size: 3rem;
        letter-spacing: 1px;
        font-weight: 700;
        text-shadow: 5px -2px 1px #c2c2c2;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
        padding: 10px 15px;
        text-align: center;
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

    .btn {
        margin-right: 10px;
    }

    .d-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    @media (max-width: 768px) {
        .container {
            width: 90%;
            padding: 10px;
        }

        .card-header {
            font-size: 1.2em;
            padding: 8px 12px;
        }

        .card-body {
            padding: 15px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .d-flex {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 576px) {
        .container {
            width: 95%;
            padding: 5px;
        }

        .card-header {
            font-size: 1em;
            padding: 5px 10px;
        }

        .card-body {
            padding: 10px;
        }

        .form-group {
            margin-bottom: 8px;
        }

        .btn {
            width: 100%;
            margin-bottom: 8px;
        }

        .d-flex {
            flex-direction: column;
            align-items: center;
        }
    }
    </style>
</head>

<body>
    <?php require '../Boostrap/headerNav.php'; ?>

    <h1 class="profil">Profil</h1>

    <!-- ***********
    formulaire -->
    <div class="d-flex ">


        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input type="text" class="form-control" id="nom" value="<?= $_SESSION['user']['nom'] ?>"
                                    readonly>
                                <a href="updateProfil.php?field=nom" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom:</label>
                                <input type="text" class="form-control" id="prenom"
                                    value="<?= $_SESSION['user']['prenom'] ?>" readonly>
                                <a href="updateProfil.php?field=prenom" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email"
                                    value="<?= $_SESSION['user']['email'] ?>" readonly>
                                <a href="updateProfil.php?field=email" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Âge:</label>
                                <input type="number" class="form-control" id="age"
                                    value="<?= $_SESSION['user']['age'] ?>" readonly>
                                <a href="modifier.php?field=age" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse:</label>
                                <input type="text" class="form-control" id="adresse"
                                    value="<?= $_SESSION['user']['adresse'] ?>" readonly>
                                <a href="updateProfil.php?field=adresse"
                                    class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">Code Postal:</label>
                                <input type="text" class="form-control" id="code_postal"
                                    value="<?= $_SESSION['user']['code_postal'] ?>" readonly>
                                <a href="updateProfil.php?field=code_postal"
                                    class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville:</label>
                                <input type="text" class="form-control" id="ville"
                                    value="<?= $_SESSION['user']['ville'] ?>" readonly>
                                <a href="updateProfil.php?field=ville" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                            <div class="mb-3">
                                <label for="pays" class="form-label">Pays:</label>
                                <input type="text" class="form-control" id="pays"
                                    value="<?= $_SESSION['user']['pays'] ?>" readonly>
                                <a href="updateProfil.php?field=pays" class="btn btn-primary btn-sm mt-2">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Informations de Connexion</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" readonly class="form-control-plaintext" id="email"
                                        value="<?= htmlspecialchars($_SESSION['user']['email']) ?>">
                                </div>
                                <div class="col-sm-1">
                                    <a href="edit-profile.php?field=email" class="btn btn-warning">Modifier</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
                                <div class="col-sm-7">
                                    <input type="password" readonly class="form-control-plaintext" id="password"
                                        value="*******">
                                </div>

                                <div class="col-sm-2">
                                    <a href="edit-profile.php?field=password" class="btn btn-warning mt-2">Modifier</a>
                                </div>

                                <div class="col-sm-2">
                                    <button id="togglePassword" class="btn btn-success  ">Afficher </button>
                                </div>


                            </div>
                        </form>
                        <a class="text-center" href="../logout/logout.php">Cliquez ici pour vous reconnecter</a>
                    </div>
                </div>
            </div>
        </div>




    </div>



    <?php require '../Boostrap/footerAccueil.php'; ?>

</body>
<script>
const togglePasswordBtn = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');

togglePasswordBtn.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordBtn.textContent = 'Masquer';
    } else {
        passwordInput.type = 'password';
        togglePasswordBtn.innerHTML = 'Afficher';
    }
});
</script>