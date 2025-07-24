<?php
require_once "../includes/auth.php";
$etudiant = $_SESSION['etudiant'];
echo "<h2>Bienvenue ".$etudiant['prenom']." ".$etudiant['nom']."</h2>";
?>
<nav style="background:#1a73e8; padding:10px;">
    <a href="dashboard.php" style="color:white; margin:0 10px;">Accueil</a>
    <a href="changer_motdepasse.php" style="color:white; margin:0 10px;">Changer mot de passe</a>
    <a href="voir_notes.php" style="color:white; margin:0 10px;">Voir notes</a>
    <a href="voir_matiere.php" style="color:white; margin:0 10px;">Voir matières et informations personnelles</a>
    <a href="../deconnexion.php" style="color:white; margin:0 10px;">Déconnexion</a>

</nav>

<div style="margin: 30px 0;">
    <h3>Bienvenue sur votre espace étudiant !</h3>
    <p>
        Ce site vous permet de gérer facilement vos informations scolaires. 
        Vous pouvez inscrire de nouveaux étudiants, consulter la liste des étudiants inscrits, 
        et mettre à jour vos informations personnelles. Utilisez le menu ci-dessus pour naviguer entre les différentes sections.
    </p>
</div>

<footer style="background: linear-gradient(90deg, #1a73e8 0%, #4285f4 100%); color: #fff; text-align: center; padding: 18px 0; position: fixed; bottom: 0; width: 100%; font-size: 1.1em; box-shadow: 0 -2px 10px rgba(26,115,232,0.08); letter-spacing: 1px;">
    &copy; <?php echo date('Y'); ?> <span style="font-weight:bold;">Gestion Scolaire</span> &mdash; Tous droits réservés.
</footer>
<style>
    body {
        font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: #f7fafd;
        margin: 0;
        padding-bottom: 70px;
    }
    h2 {
        color: #1a73e8;
        margin-top: 30px;
        text-align: center;
        letter-spacing: 1px;
        font-size: 2.2em;
    }
    nav {
        border-radius: 0 0 10px 10px;
        box-shadow: 0 2px 8px rgba(26,115,232,0.07);
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    nav a {
        color: #fff;
        margin: 0 18px;
        text-decoration: none;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 4px;
        transition: background 0.2s;
        font-size: 1.15em;
    }
    nav a:hover, nav a:focus {
        background: rgba(255,255,255,0.15);
        text-decoration: underline;
    }
    .dashboard-content {
        background: #fff;
        max-width: 700px;
        margin: 50px auto 0 auto;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(26,115,232,0.08);
        padding: 48px 44px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .dashboard-content h3 {
        color: #4285f4;
        margin-bottom: 22px;
        font-size: 2em;
        text-align: center;
    }
    .dashboard-content p {
        color: #444;
        font-size: 1.25em;
        line-height: 1.8;
        text-align: center;
        max-width: 90%;
    }
    footer {
        background: #1a73e8;
        color: #fff;
        text-align: center;
        padding: 18px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        font-size: 1.1em;
        box-shadow: 0 -2px 10px rgba(26,115,232,0.08);
        letter-spacing: 1px;
    }
</style>
<script>
    // Centrer le contenu principal dans une section centrale
    document.addEventListener('DOMContentLoaded', function() {
        var mainContent = document.querySelector('div[style*="margin: 30px 0;"]');
        if (mainContent) {
            mainContent.classList.add('dashboard-content');
            mainContent.removeAttribute('style');
        }
    });
</script>