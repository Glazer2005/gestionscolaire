<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php"; // Inclusion de la connexion PDO

// Vérifier que l'étudiant est connecté
if (!isset($_SESSION['etudiant'])) {
    header("Location: ../index.php");
    exit;
}

$matricule = $_SESSION['etudiant']['matricule'];

// Préparer et exécuter la requête pour récupérer les notes
$stmt = $pdo->prepare("SELECT m.libelle, n.note FROM notes n JOIN matieres m ON n.code_matiere = m.code WHERE n.matricule = ?");
$stmt->execute([$matricule]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Voir mes notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef3fa;
            margin: 0; padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 25px;
        }
        .note-item {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }
        .note-item:last-child {
            border-bottom: none;
        }
        .note-label {
            font-weight: bold;
            color: #333;
        }
        .note-value {
            float: right;
            color: #0073e6;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Mes notes</h1>
    <?php
    $hasNotes = false;
    while ($row = $stmt->fetch()) {
        $hasNotes = true;
        echo '<div class="note-item">';
        echo '<span class="note-label">' . htmlspecialchars($row['libelle']) . '</span>';
        echo '<span class="note-value">' . htmlspecialchars($row['note']) . '</span>';
        echo '</div>';
    }

    if (!$hasNotes) {
        echo "<p>Aucune note trouvée.</p>";
    }
    ?>
</div>
</body>
</html>
