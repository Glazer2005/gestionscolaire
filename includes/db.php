<?php
$host = "localhost";
$user = "root"; // à adapter si ton utilisateur MySQL est différent
$password = "root";
$dbname = "gestion_notes";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
