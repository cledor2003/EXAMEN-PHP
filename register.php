<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $numero_permis = $_POST['numero_permis'];

    $sql = "INSERT INTO client (nom, prenom, email, password, date_naissance, adresse, numero_permis) 
            VALUES ('$nom', '$prenom', '$email', '$password', '$date_naissance', '$adresse', '$numero_permis')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>


