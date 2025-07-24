<?php
require_once "../includes/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hachage du mot de passe par défaut
    $motdepasse_defaut = password_hash("123456", PASSWORD_DEFAULT);

    // Requête SQL pour insérer l'étudiant
    $stmt = $pdo->prepare("INSERT INTO etudiants (matricule, nom, prenom, adresse, telephone, password, id_formation)
                           VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['matricule'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['adresse'],
        $_POST['telephone'],
        $motdepasse_defaut, // mot de passe haché ici
        $_POST['id_formation']
    ]);

    echo "<p>✅ Étudiant ajouté avec succès.</p>";
}
?>
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Étudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e7f0fa;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,80,0.1);
        }
        h2 {
            text-align: center;
            color: #1a73e8;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #333;
        }
        input[type=text],
        input[type=password],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type=submit] {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }
        input[type=submit]:hover {
            background: #155ab6;
        }
        .message {
            background: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-top: 15px;
            border-radius: 6px;
            text-align: center;
        }
    
        .btn-retour {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #1a73e8;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .btn-retour:hover {
            background-color: #155ab6;
}

    </style>
</head>
<body>
<div class="container">
    <h2>Ajouter un étudiant</h2>

    <?php if (!empty($message)) : ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
        <label for="matricule">Matricule :</label>
        <input type="text" name="matricule" required>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" required>

        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" required>

        <!-- mot de passe caché, auto généré côté PHP -->

        <label for="id_formation">Formation :</label>
        <select name="id_formation" required>
            <option value="">-- Sélectionner une formation --</option>
            <?php
            $res = $pdo->query("SELECT * FROM formations");
            while ($row = $res->fetch()) {
                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['libelle']) . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Ajouter">
        <a href="dashboard.php" class="btn-retour">⬅ Retour au tableau de bord</a>
            
    </form>
</div>
</body>
</html>
