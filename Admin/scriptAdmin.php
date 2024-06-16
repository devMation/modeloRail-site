 <?php
    session_start(); // Démmarre une session
    require '../connect_database/connect.php';

    $errorMsg = "";   

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if ($email != "" && $password != "") {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]);
            $req = $stmt->fetch();

            if ($req && $req['id'] != false) {
                // Set session variables
                $_SESSION['admin_id'] = $req['id'];
                $_SESSION['admin_email'] = $req['email'];

                // Redirect to the admin dashboard or another page
                header("Location: ../Ajout/ajoutArticles.php");
                exit();
            } else {
                $errorMsg = "email ou mot de passe incorrect";
            }
        }
    }
 
    ?>