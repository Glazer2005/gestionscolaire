<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

$stmt = $pdo->query("SELECT e.nom, e.prenom, m.libelle AS matiere, n.note
                    FROM notes n
                    JOIN etudiants e ON n.matricule = e.matricule
                    JOIN matieres m ON n.code_matiere = m.code");

echo "<h2>Liste des notes</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Matière</th><th>Note</th></tr>";

while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>".$row['nom']."</td>";
    echo "<td>".$row['prenom']."</td>";
    echo "<td>".$row['matiere']."</td>";
    echo "<td>".$row['note']."</td>";
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
        background-color: #f8f9fa;
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
    }
    th, td {
        padding: 12px 18px;
        text-align: left;
    }
    th {
        background-color: #007bff;
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e9ecef;
    }
</style>
