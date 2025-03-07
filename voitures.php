<?php
include 'db.php';

$sql = "SELECT * FROM voiture";
$result = $conn->query($sql);

echo "<h2>Liste des voitures</h2>";
echo "<table border='1'><tr><th>Marque</th><th>Modèle</th><th>Année</th><th>Statut</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['marque']}</td>
            <td>{$row['modele']}</td>
            <td>{$row['annee']}</td>
            <td>{$row['statut']}</td>
          </tr>";
}

echo "</table>";
?>
