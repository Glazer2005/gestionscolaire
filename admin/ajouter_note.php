<form method="post">
    Matricule étudiant : <input type="text" name="matricule"><br>
    Matière : 
    <select name="code_matiere">
        <!-- liste des matières -->
    </select><br>
    Note : <input type="number" name="note" step="0.01"><br>
    <input type="submit" value="Ajouter">
    <button style="background-color: #0073e6; color: white; border: none; padding: 10px 20px; cursor: pointer;"><a href="dashboard.php">Retour</a></button>
</form>
<style>
form {
    background: #f9f9f9;
    padding: 24px;
    border-radius: 8px;
    max-width: 350px;
    margin: 32px auto;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    font-family: Arial, sans-serif;
}
form input[type="text"],
form input[type="number"],
form select {
    width: 100%;
    padding: 8px;
    margin: 8px 0 16px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
form input[type="submit"] {
    background: #0073e6;
    color: #fff;
    border: none;
    padding: 10px 18px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}
form input[type="submit"]:hover {
    background: #005bb5;
}
</style>