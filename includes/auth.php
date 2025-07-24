<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ici, ton code d'authentification, ex :
// if (!isset($_SESSION['etudiant'])) {
//     header("Location: ../index.php");
//     exit;
// }


function isAdmin() {
    return isset($_SESSION['user']);
}

function isEtudiant() {
    return isset($_SESSION['etudiant']);
}
?>
