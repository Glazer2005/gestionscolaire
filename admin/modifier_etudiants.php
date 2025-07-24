<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

if (!isAdmin()) {
    header("Location: ../index.php");
    exit;
}

// Récupérer tous les étudiants
$stmt = $pdo->query("SELECT matricule, nom, prenom FROM etudiants ORDER BY nom ASC");
$etudiants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des étudiants</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #eef3fa; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; margin: auto; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #1a73e8; color: white; }
        tr:nth-child(even) { background-color: #f4f8ff; }
        a.btn-modifier {
            background-color: #1a73e8; color: white;
            padding: 6px 12px; border-radius: 5px;
            text-decoration: none; font-weight: bold;
            transition: background-color 0.3s ease;
        }
        a.btn-modifier:hover {
            background-color: #155ab6;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Liste des étudiants</h2>
    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['matricule']) ?></td>
                    <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                    <td>
                        <a class="btn-modifier" href="modifier_etudiants.php?matricule=<?= urlencode($etudiant['matricule']) ?>">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
