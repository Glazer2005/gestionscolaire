
<?php
$host = "localhost";
$user = "root"; // à adapter si ton utilisateur MySQL est différent
$password = "root";
$dbname = "gestion_notes";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
$stmt = $pdo->query("SELECT id, email, mot_de_passe, role FROM admin");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Administrateurs</title>
    <link rel="stylesheet" href="style.css"> <!-- Assurez-vous que ce fichier CSS existe -->
    <style>
        /* Exemple de CSS si style.css n'existe pas */
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { width: 80%; margin: 40px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #007bff; color: #fff; }
        tr:hover { background: #f1f1f1; }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des Administrateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= htmlspecialchars($admin['id']) ?></td>
                    <td><?= htmlspecialchars($admin['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>