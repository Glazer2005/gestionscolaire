<?php
require_once "../includes/auth.php";
if (!isAdmin()) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tableau de bord</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h2>Bienvenue Admin</h2>
    <ul>
        <li><a href="ajouter_etudiant.php">Inscrire un étudiant</a></li>
        <li><a href="ajouter_formation.php">Ajouter une formation</a></li>
        <li><a href="ajouter_matiere.php">Ajouter une matière</a></li>
        <li><a href="ajouter_note.php">Ajouter une note</a></li>
        <li><a href="modifier_etudiants.php">Modifier un étudiant</a></li>
        <li><a href="modifier_note.php">Modifier une note</a></li>
        <li><a href="voir_etudiants.php">Voir les étudiants</a></li>
        <li><a href="voir_notes.php">Voir les notes</a></li>
        <li><a href="../deconnexion.php">Déconnexion</a></li>
    </ul>
    <div style="text-align:center; margin-top:30px;">
        <a href="ajouter_admin.php" class="admin-btn">Ajouter un administrateur</a>
    </div>
<style>
.admin-btn {
    display: inline-block;
    padding: 12px 20px;
    background: #0073e6;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
}
.admin-btn:hover {
    background: #005bb5;
}

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #e9ecef;
        margin: 0;
        padding: 0;
    }
    h2 {
        color: #222;
        text-align: center;
        margin-top: 40px;
        letter-spacing: 1px;
    }
    ul {
        list-style: none;
        padding: 0;
        margin: 40px auto;
        max-width: 420px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        overflow: hidden;
    }
    ul li {
        border-bottom: 1px solid #f1f1f1;
    }
    ul li:last-child {
        border-bottom: none;
    }
    ul li a {
        display: block;
        padding: 15px 22px;
        color: #333;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
        font-size: 1em;
    }
    ul li a:hover, ul li a.admin-link:hover {
        background: #007bff;
        color: #fff;
    }
    .admin-link {
        font-weight: bold;
        color: #d35400;
    }
</style>

</body>
</html>
