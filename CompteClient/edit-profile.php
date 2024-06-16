<?php
// session_start();
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';
require_once '../redirect/redirect_if_not_logged_in.php';

$field = $_GET['field'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newValue = htmlspecialchars($_POST['new_value']);
    $userId = $_SESSION['user']['id'];

    if ($field == 'email') {
        $stmt = $conn->prepare("UPDATE user SET email = ? WHERE id = ?");
        $stmt->execute([$newValue, $userId]);
        $_SESSION['user']['email'] = $newValue;
    } elseif ($field == 'pseudo') {
        $stmt = $conn->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
        $stmt->execute([$newValue, $userId]);
        $_SESSION['user']['pseudo'] = $newValue;
    } elseif ($field == 'password') {
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
        $stmt->execute([$newValue, $userId]);
    }

    header('Location: profil.php');
    exit();
}
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
        max-width: 800px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Modifier <?= htmlspecialchars($field) ?></h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="new_value">Nouveau <?= htmlspecialchars($field) ?></label>
                                <input type="text" class="form-control" id="new_value" name="new_value" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="profil.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>