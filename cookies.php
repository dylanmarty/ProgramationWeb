<?php
session_start();

// Vérifie si l'utilisateur a déjà accepté les cookies
if (isset($_POST['acceptCookies'])) {
    $_SESSION['cookiesAccepted'] = true;
    header("Location: index.php"); // Redirige vers la page principale après acceptation
    exit();
}

if (!isset($_SESSION['cookiesAccepted'])) {
    $showCookieBanner = true; // Affiche le bandeau si les cookies ne sont pas acceptés
} else {
    $showCookieBanner = false;
}
