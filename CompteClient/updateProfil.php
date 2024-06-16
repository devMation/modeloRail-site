<?php
session_start();
require '../connect_database/connect.php';
require '../Boostrap/boostrap.php';
require_once '../redirect/redirect_if_not_logged_in.php';

$field = $_GET['field'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newValue = htmlspecialchars($_POST['new_value']);
    $userId = $_SESSION['user']['id'];

    switch ($field) {
        case 'email':
            $stmt = $conn->prepare("UPDATE user SET email = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['email'] = $newValue;
            break;
        case 'pseudo':
            $stmt = $conn->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['pseudo'] = $newValue;
            break;
        case 'password':
            $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
            $stmt->execute([sha1($newValue), $userId]); // Assuming you want to hash the password
            break;
        case 'nom':
            $stmt = $conn->prepare("UPDATE user SET nom = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['nom'] = $newValue;
            break;
        case 'prenom':
            $stmt = $conn->prepare("UPDATE user SET prenom = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['prenom'] = $newValue;
            break;
        case 'age':
            $stmt = $conn->prepare("UPDATE user SET age = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['age'] = $newValue;
            break;
        case 'adresse':
            $stmt = $conn->prepare("UPDATE user SET adresse = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['adresse'] = $newValue;
            break;
        case 'code_postal':
            $stmt = $conn->prepare("UPDATE user SET code_postal = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['code_postal'] = $newValue;
            break;
        case 'ville':
            $stmt = $conn->prepare("UPDATE user SET ville = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['ville'] = $newValue;
            break;
        case 'pays':
            $stmt = $conn->prepare("UPDATE user SET pays = ? WHERE id = ?");
            $stmt->execute([$newValue, $userId]);
            $_SESSION['user']['pays'] = $newValue;
            break;
    }

    header('Location: profil.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>Modifier le Profil</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
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