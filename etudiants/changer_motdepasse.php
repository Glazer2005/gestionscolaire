
<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

$matricule = $_SESSION['etudiant']['matricule'];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ancien = $_POST['ancien'];
    $nouveau = $_POST['nouveau'];

    // Vérifier l'ancien mot de passe
    $stmt = $pdo->prepare("SELECT * FROM etudiants WHERE matricule = ?");
    $stmt->execute([$matricule]);
    $etudiant = $stmt->fetch();

    if ($etudiant && password_verify($ancien, $etudiant['password'])) {
        $nouveau_hash = password_hash($nouveau, PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE etudiants SET password = ? WHERE matricule = ?");
        $update->execute([$nouveau_hash, $matricule]);
        echo "<p>✅ Mot de passe mis à jour.</p>";
    } else {
        echo "<p>❌ Ancien mot de passe incorrect.</p>";
    }
}
?>

<form method="post">
    Ancien mot de passe: <input type="password" name="ancien"><br>
    Nouveau mot de passe: <input type="password" name="nouveau"><br>
    <input type="submit" value="Changer">
</form>


<form method="post">
    Nouveau mot de passe : <input type="password" name="password">
    <style>
        form {
            max-width: 350px;
            margin: 40px auto;
            padding: 24px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fafafa;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 12px 0;
            border: 1px solid #bbb;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</form>
