<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="css/Navigation.css" rel="stylesheet">
  <title>ENSIMgames</title>
</head>

<body>
  <!-- Menu de navigation -->
  <header class="navbar">
    <h1>ENSIMgames</h1>
    <ul class="nav-links">
      <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
      <!-- Menu déroulant pour les jeux -->
      <li>
        <div class="dropdown">
          <a class="dropbtn"><i class="fas fa-gamepad"></i> Jeux</a>
          <div class="dropdown-content">
            <a href="AttrapeLesEtoiles.php">AttrapeLesEtoiles</a>
            <a href="Pong.php">Pong</a>
            <a href="Memoire_Carte.php">Mémory</a>
          </div>
        </div>
      </li>

      </li>
      <li><a href="Meilleur_Score.php"><i class="fas fa-trophy"></i>Meilleurs Scores</a></li>

      <?php if (isset($_SESSION['Nom']) && isset($_SESSION['Prenom'])): ?>
        <!-- Si l'utilisateur est connecté -->
        <li><a href="#"><i class="fas fa-user"></i>Bienvenue, <?php echo $_SESSION['Prenom'] . " " . $_SESSION['Nom']; ?></a></li>
        <li><a href="deconnexion.php">Se déconnecter</a></li>
      <?php else: ?>
        <!-- Si l'utilisateur n'est pas connecté -->
        <li><a href="connexion.php"><i class="fas fa-sign-in-alt"></i>Connexion</a></li>
        <li><a href="inscription.php"><i class="fas fa-user-plus"></i>Inscription</a></li>
      <?php endif; ?>
    </ul>
  </header>
  <script>
    function toggleMenu() {
      const navLinks = document.querySelector('.nav-links');
      navLinks.classList.toggle('active');
    }
  </script>
</body>

</html>