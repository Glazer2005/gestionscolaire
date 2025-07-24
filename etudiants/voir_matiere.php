<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

$etudiant = $_SESSION['etudiant'];

// Récupérer la formation
$stmtFormation = $pdo->prepare("SELECT * FROM formations WHERE id = ?");
$stmtFormation->execute([$etudiant['id_formation']]);
$formation = $stmtFormation->fetch();
$libelle_formation = $formation ? htmlspecialchars($formation['libelle']) : "Non trouvée";

// Récupérer les matières de la formation
$stmtMatieres = $pdo->prepare("SELECT * FROM matieres WHERE id_formation = ?");
$stmtMatieres->execute([$etudiant['id_formation']]);
$matieres = $stmtMatieres->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes informations</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #eef3fa; }
        .container {
            max-width: 700px; margin: 50px auto; background: white;
            padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,80,0.1);
        }
        h2 {
            text-align: center; color: #1a73e8; margin-bottom: 30px;
        }
        table {
            width: 100%; border-collapse: collapse; margin-bottom: 20px;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ccc;
        }
        td.label {
            font-weight: bold;
            width: 40%;
            color: #333;
        }
        .matieres-list {
            list-style-type: none; padding-left: 0;
        }
        .matieres-list li {
            background-color: #f4f8ff; margin: 5px 0;
            padding: 10px; border-radius: 5px;
        }
        .btn-retour {
            display: inline-block; margin-top: 30px;
            padding: 10px 18px; background-color: #1a73e8;
            color: #fff; text-decoration: none; border-radius: 8px;
        }
        .btn-retour:hover {
            background-color: #155ab6;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Mes informations</h2>
    <table>
        <tr><td class="label">Matricule :</td><td><?= htmlspecialchars($etudiant['matricule']) ?></td></tr>
        <tr><td class="label">Nom :</td><td><?= htmlspecialchars($etudiant['nom']) ?></td></tr>
        <tr><td class="label">Prénom :</td><td><?= htmlspecialchars($etudiant['prenom']) ?></td></tr>
        <tr><td class="label">Formation :</td><td><?= $libelle_formation ?></td></tr>
    </table>

    <h3 style="color:#1a73e8;">Matières de ma formation :</h3>
    <ul class="matieres-list">
        <?php if ($matieres && count($matieres) > 0): ?>
            <?php foreach ($matieres as $matiere): ?>
                <li><?= htmlspecialchars($matiere['libelle']) ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucune matière trouvée.</li>
        <?php endif; ?>
    </ul>

    <a href="dashboard.php" class="btn-retour">⬅ Retour</a>
</div>

</body>
</html>
