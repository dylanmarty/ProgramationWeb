<?php
session_start();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Supprimer les cookies
setcookie('email', '', time() - 3600, "/");  // Supprimer le cookie en le mettant à une date d'expiration passée

header("Location: ../connexion.php");  // Rediriger l'utilisateur vers la page de connexion
exit();
?>
