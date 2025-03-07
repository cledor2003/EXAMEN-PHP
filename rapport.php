<?php
include 'db.php';

$sql = "SELECT COUNT(*) as total_reservations FROM reservation";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<h2>Rapport</h2>";
echo "Nombre total de réservations : " . $row['total_reservations'];
?>
