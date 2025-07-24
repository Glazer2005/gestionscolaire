<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

$stmt = $pdo->query("SELECT e.matricule, e.nom, e.prenom, f.libelle FROM etudiants e 
                     JOIN formations f ON e.id_formation = f.id");

echo "<h2>Liste des étudiants</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Matricule</th><th>Nom</th><th>Prénom</th><th>Formation</th></tr>";
echo"<button style='border-radius: 5px;background-color: #0073e6;color: white;font-color: white;border: none;padding: 10px 20px;cursor: pointer; text-decoration: none;'><a href='dashboard.php'>Retour</a></button>";
while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>".$row['matricule']."</td>";
    echo "<td>".$row['nom']."</td>";
    echo "<td>".$row['prenom']."</td>";
    echo "<td>".$row['libelle']."</td>";
    echo "</tr>";
}
echo "</table>";
if (!isAdmin()) {
    header("Location: ../index.php");
    exit;
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        margin: 30px;
    }
    h2 {
        color: #333;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        background: #fff;
        margin-top: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    th, td {
        padding: 12px 16px;
        text-align: left;
    }
    th {
        background: #0074D9;
        color: #fff;
    }
    tr:nth-child(even) {
        background: #f2f2f2;
    }
    a {
        color: #0074D9;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
