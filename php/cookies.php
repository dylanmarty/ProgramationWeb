<?php
session_start();

// Vérifie si l'utilisateur a accepté ou refusé les cookies
if (isset($_POST['accept'])) {
    $_SESSION['cookie_consent'] = 'accepté';
    header("Location: index.php"); // Redirige vers la page principale après acceptation
    exit();
}

if (isset($_POST['reject'])) {
    $_SESSION['cookie_consent'] = 'refusé';
    header("Location: index.php"); // Redirige vers la page principale après le rejet
    exit();
}

// Si la session n'a pas été définie, on doit afficher le bandeau
if (!isset($_SESSION['cookie_consent'])) {
    $showCookieBanner = true;
} else {
    $showCookieBanner = false;
}
?>
