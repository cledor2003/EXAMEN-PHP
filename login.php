<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM client WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        echo "Connexion réussie ! <a href='dashboard.html'>Accédez à votre espace</a>";
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
