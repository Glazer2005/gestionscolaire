<?php
session_start();
require_once "includes/db.php"; // connexion PDO

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($type === 'admin') {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
$stmt->execute([$login]);

        $admin = $stmt->fetch();

        if ($admin  === $admin['mot_de_passe']) {
            $_SESSION['admin'] = $admin;
            header("Location: admin/dashboard.php");
            exit;
        } else {
            $erreur = "Identifiant ou mot de passe admin incorrect.";
        }

    } elseif ($type === 'etudiant') {
        $stmt = $pdo->prepare("SELECT * FROM etudiants WHERE matricule = ?");
        $stmt->execute([$login]);
        $etudiant = $stmt->fetch();

        if ($etudiant && $password === $etudiant['mot_de_passe']) {
            $_SESSION['etudiant'] = $etudiant;
            header("Location: etudiants/dashboard.php");
            exit;
        } else {
            $erreur = "Identifiant ou mot de passe étudiant incorrect.";
        }

    } else {
        $erreur = "Veuillez sélectionner un type d'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef3fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 360px;
            margin: 60px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 80, 0.1);
        }

        h2 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        select, input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #155ab6;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
    <?php if ($erreur): ?>
        <div class="error"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <form method="post" id="loginForm">
        <label for="type">Type d'utilisateur :</label>
        <select name="type" id="type" required onchange="afficherChamp()">
            <option value="">-- Sélectionner --</option>
            <option value="admin">Admin</option>
            <option value="etudiant">Étudiant</option>
        </select>

        <div id="champAdmin" style="display: none;">
            <label for="login_admin">Email (admin):</label>
            <input type="text" id="login_admin" name="login">
        </div>

        <div id="champEtudiant" style="display: none;">
            <label for="login_etudiant">Matricule (étudiant):</label>
            <input type="text" id="login_etudiant" name="login">
        </div>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Se connecter">
    </form>
</div>

<script>
function afficherChamp() {
    const type = document.getElementById("type").value;
    const champAdmin = document.getElementById("champAdmin");
    const champEtudiant = document.getElementById("champEtudiant");
    const loginAdmin = document.getElementById("login_admin");
    const loginEtudiant = document.getElementById("login_etudiant");

    if (type === "admin") {
        champAdmin.style.display = "block";
        champEtudiant.style.display = "none";
        loginAdmin.name = "login";
        loginEtudiant.name = "";
    } else if (type === "etudiant") {
        champAdmin.style.display = "none";
        champEtudiant.style.display = "block";
        loginAdmin.name = "";
        loginEtudiant.name = "login";
    } else {
        champAdmin.style.display = "none";
        champEtudiant.style.display = "none";
        loginAdmin.name = "";
        loginEtudiant.name = "";
    }
}
</script>
</body>
</html>
