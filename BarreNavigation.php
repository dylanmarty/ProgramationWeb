<?php
// Vérifiez si la session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  <title>ENSIMgames</title>
</head>

<body>
    <!-- Menu de navigation -->
    <header class="navbar">
      <h1>ENSIMgames</h1>
      <ul class="nav-links">
        <li><a href="index.php">Accueil</a></li>
         <!-- Menu déroulant pour les jeux -->
      <li class="dropdown">
        <a href="#" class="dropbtn">Jeux</a>
        <div class="dropdown-content">
          <a href="AttrapeLesEtoiles.php">Attrape les etoiles </a>
          <a href="Pong.php">Pong</a>
        </div>
      </li>
        <li><a href="#scores">Meilleurs Scores</a></li>

        <?php if (isset($_SESSION['Nom']) && isset($_SESSION['Prenom'])): ?>
          <!-- Si l'utilisateur est connecté -->
          <li><a href="#">Bienvenue, <?php echo $_SESSION['Prenom'] . " " . $_SESSION['Nom']; ?></a></li>
          <li><a href="deconnexion.php">Se déconnecter</a></li>
        <?php else: ?>
          <!-- Si l'utilisateur n'est pas connecté -->
          <li><a href="connexion.php">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>
        <?php endif; ?>
      </ul>
    </header>
</body>

</html>
