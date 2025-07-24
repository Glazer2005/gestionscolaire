<?php
require_once "../includes/auth.php";
require_once "../includes/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO admin (email, mot_de_passe) VALUES (?, ?)");
    $stmt->execute([$email, $pass]);
    echo "Nouvel administrateur ajouté.";
}
?>
<style>
form {
    max-width: 400px;
    margin: 40px auto;
    padding: 24px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background: #fafafa;
    font-family: Arial, sans-serif;
}
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 8px 10px;
    margin: 8px 0 16px 0;
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
    font-size: 16px;
}
input[type="submit"]:hover {
    background: #0056b3;
}
label {
    font-weight: bold;
}
</style>
<?php
?>

<form method="post">
    Email : <input type="email" name="email" required><br>
    Mot de passe : <input type="password" name="password" required><br>
    <input type="submit" value="Créer un administrateur">
</form>
