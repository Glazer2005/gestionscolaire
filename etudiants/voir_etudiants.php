<?php
session_start();
require_once "../includes/db.php";

// Vérifie si l'utilisateur est connecté (admin ou étudiant)
if (!isset($_SESSION['user']) && !isset($_SESSION['etudiant'])) {
    header("Location: ../index.php");
    exit;
}

// Requête pour récupérer tous les étudiants
$stmt = $pdo->query("SELECT e.*, f.libelle AS formation FROM etudiants e JOIN formations f ON e.id_formation = f.id ORDER BY e.nom ASC");
$etudiants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <style>
        body { font-family: Arial; background-color: #eef3fa; }
        .container {
            max-width: 900px; margin: 40px auto; background: white;
            padding: 25px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,80,0.1);
        }
        h2 { text-align: center; color: #1a73e8; margin-bottom: 20px; }
        table {
            width: 100%; border-collapse: collapse; background: #fff;
        }
        th, td {
            border: 1px solid #ccc; padding: 10px; text-align: left;
        }
        th {
            background-color: #1a73e8; color: white;
        }
        tr:nth-child(even) {
            background-color: #f4f8ff;
        }
        .btn-retour {
            display: inline-block; margin-top: 20px;
            padding: 10px 18px; background-color: #1a73e8; color: #fff;
            text-decoration: none; border-radius: 8px;
        }
        .btn-retour:hover {
            background-color: #155ab6;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Liste des étudiants</h2>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Formation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?= htmlspecialchars($etudiant['matricule']) ?></td>
                        <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                        <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                        <td><?= htmlspecialchars($etudiant['adresse']) ?></td>
                        <td><?= htmlspecialchars($etudiant['telephone']) ?></td>
                        <td><?= htmlspecialchars($etudiant['formation']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align:center;">
        <a href="dashboard.php" class="btn-retour">⬅ Retour</a>
    </div>
</div>
</body>
</html>
