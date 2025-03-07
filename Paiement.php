<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reservation = $_POST['id_reservation'];
    $montant = $_POST['montant'];
    $date_paiement = date("Y-m-d");
    $mode_paiement = $_POST['mode_paiement'];

    $sql = "INSERT INTO paiement (id_reservation, montant, date_paiement, mode_paiement) 
            VALUES ('$id_reservation', '$montant', '$date_paiement', '$mode_paiement')";

    if ($conn->query($sql) === TRUE) {
        echo "Paiement enregistré !";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>
