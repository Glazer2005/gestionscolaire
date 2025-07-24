<?php
require_once "../includes/db.php"; // ← ajout essentiel

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO matieres (code, libelle, id_formation) VALUES (?, ?, ?)");
    $stmt->execute([
        $_POST['code'],
        $_POST['libelle'],
        $_POST['id_formation']
    ]);
    echo "<p>Matière ajoutée avec succès.</p>";
}
?>

<form method="post">
    Code : <input type="text" name="code"><br>
    Libellé : <input type="text" name="libelle"><br>
    Formation :
    <select name="id_formation">
        <?php
        // Affichage des formations
        $stmt = $pdo->query("SELECT * FROM formations");
        while ($row = $stmt->fetch()) {
            echo "<option value='".$row['id']."'>".htmlspecialchars($row['libelle'])."</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Ajouter">
    <a href="dashboard.php" class="btn-retour">Retour</a>
</form>

<style>
    form {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        width: 350px;
        margin: 30px auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }
    input[type="text"], select {
        width: 95%;
        padding: 8px;
        margin: 8px 0 16px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #0073e6;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #005bb5;
    }
    .btn-retour {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 18px;
        background-color: #0073e6;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
</style>
