<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

if (!isAdmin()) {
    header("Location: ../index.php");
    exit;
}

// Récupérer toutes les notes avec info étudiant + matière
$sql = "SELECT n.id, n.matricule, e.nom, e.prenom, n.code_matiere, m.libelle AS matiere, n.note
        FROM notes n
        JOIN etudiants e ON n.matricule = e.matricule
        JOIN matieres m ON n.code_matiere = m.code
        ORDER BY e.nom, e.prenom";

$stmt = $pdo->query($sql);
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef3fa;
            margin: 40px;
        }
        h2 {
            color: #1a73e8;
            text-align: center;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,80,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #1a73e8;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f4f8ff;
        }
        a.btn-modifier {
            display: inline-block;
            background-color: #1a73e8;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9em;
        }
        a.btn-modifier:hover {
            background-color: #155ab6;
        }
        .btn-retour {
            display: inline-block;
            margin: 20px auto;
            background-color: #555;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .btn-retour:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<h2>Liste des notes des étudiants</h2>

<table>
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matière</th>
            <th>Note</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notes as $note): ?>
        <tr>
            <td><?= htmlspecialchars($note['matricule']) ?></td>
            <td><?= htmlspecialchars($note['nom']) ?></td>
            <td><?= htmlspecialchars($note['prenom']) ?></td>
            <td><?= htmlspecialchars($note['matiere']) ?></td>
            <td><?= htmlspecialchars($note['note']) ?></td>
            <td><a class="btn-modifier" href="modifier_note.php?id=<?= $note['id'] ?>">Modifier</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="dashboard.php" class="btn-retour">Retour au tableau de bord</a>

</body>
</html>
