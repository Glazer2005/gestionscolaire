<form method="post">
    Libellé de la formation : <input type="text" name="libelle">
    <input type="submit" value="Ajouter">
<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";

if (isAdmin()) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $libelle = $_POST['libelle'];
        $stmt = $pdo->prepare("INSERT INTO formations (libelle) VALUES (?)");
        $stmt->execute([$libelle]);
        echo "Formation ajoutée.";
    }
}
?>
<button style="border-radius: 5px;background-color: #0073e6;color: white;border: none;padding: 10px 20px;cursor: pointer; text-decoration: none;"><a href="../admin/">Retour</a></button>
</form>

<style>
form {
    background: #f9f9f9;
    padding: 24px;
    border-radius: 8px;
    max-width: 400px;
    margin: 40px auto;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
    gap: 16px;
}
form input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}
form input[type="submit"] {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 10px 0;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s;
}
form input[type="submit"]:hover {
    background: #0056b3;
}
</style>
<?php
