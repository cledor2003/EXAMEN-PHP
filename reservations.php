<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_client = $_SESSION['id_client'];
    $id_voiture = $_POST['id_voiture'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    $sql = "INSERT INTO reservation (id_client, id_voiture, date_debut, date_fin) 
            VALUES ('$id_client', '$id_voiture', '$date_debut', '$date_fin')";

    if ($conn->query($sql) === TRUE) {
        echo "Réservation effectuée !";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>