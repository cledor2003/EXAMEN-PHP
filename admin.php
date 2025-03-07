<?php
$conn = new mysqli('localhost', 'utilisateur', 'mot_de_passe', 'location_voitures');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if (isset($_POST['action']) && isset($_POST['id_reservation'])) {
    $action = $_POST['action'];
    $id_reservation = $_POST['id_reservation'];

    if ($action == 'valider') {
        $statut = 'confirmée';
    } elseif ($action == 'annuler') {
        $statut = 'annulée';
    }

    $sql = "UPDATE reservations SET statut = '$statut' WHERE id_reservation = $id_reservation";
    $conn->query($sql);
}

$sql = "SELECT * FROM reservations WHERE statut = 'en attente'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Réservations</title>
</head>
<body>
    <h1>Gérer les Réservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID Réservation</th>
                <th>ID Client</th>
                <th>ID Voiture</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_reservation']; ?></td>
                <td><?php echo $row['id_client']; ?></td>
                <td><?php echo $row['id_voiture']; ?></td>
                <td><?php echo $row['date_debut']; ?></td>
                <td><?php echo $row['date_fin']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="id_reservation" value="<?php echo $row['id_reservation']; ?>">
                        <button type="submit" name="action" value="valider">Valider</button>
                        <button type="submit" name="action" value="annuler">Annuler</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php    
$conn = new mysqli('localhost', 'utilisateur', 'mot_de_passe', 'location_voitures');


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT * FROM paiements WHERE statut = 'en attente'";
$result = $conn->query($sql);
?>
</body>
</html>
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

