<?php
$conn = new mysqli('localhost', 'utilisateur', 'mot_de_passe', 'location_voitures');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT * FROM paiements WHERE statut = 'en attente'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Superviser les Paiements</title>
</head>
<body>
    <h1>Superviser les Paiements</h1>
    <table>
        <thead>
            <tr>
                <th>ID Paiement</th>
                <th>ID Réservation</th>
                <th>Montant</th>
                <th>Date de Paiement</th>
                <th>Mode de Paiement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_paiement']; ?></td>
                <td><?php echo $row['id_reservation']; ?></td>
                <td><?php echo $row['montant']; ?></td>
                <td><?php echo $row['date_paiement']; ?></td>
                <td><?php echo $row['mode_paiement']; ?></td>
                <td><?php echo $row['statut']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
