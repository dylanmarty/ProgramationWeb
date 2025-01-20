<?php
include 'php/cookies.php'; // Inclut le fichier PHP pour gérer les cookies
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

<?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>

  <!-- Section Accueil -->
  <section id="accueil" class="section">
    <h2>Bienvenue sur "ENSIMgames"</h2>
    <p>Découvrez nos jeux passionnants et amusez-vous tout en rivalisant pour les meilleurs scores !</p>
    <a href="#jeux" class="btn">Voir les Jeux</a>
  </section>

  <!-- Section Jeux -->
  <section id="jeux" class="section">
    <h2>Nos Jeux</h2>
    <p>Voici nos jeux passionnants. Choisissez celui que vous souhaitez jouer et défiez vos amis pour obtenir le meilleur score :</p>

    <div id="carousel" class="responsive">
      <button id="prev" onclick="prevSlide()">&#10094;</button>
      <button id="next" onclick="nextSlide()">&#10095;</button>
      <div id="carousel-content responsive">
        <div class="carousel-item responsive">
          <h3>Attrape les Étoiles</h3> <img src="img/AttrapeEtoiles.png" alt="Image du jeu Attrape Etoiles" class="img">
          <p>Dans ce jeu, vous devez attraper des étoiles qui tombent du ciel pour marquer des points. Soyez rapide et attentif, car les étoiles tombent de plus en plus vite !</p> <a href="AttrapeLesEtoiles.php" class="btn">Jouer à Attrape les Étoiles</a>
        </div>
        <div class="carousel-item responsive">
          <h3>Pong</h3> <img src="img/Pong.png" alt="Image du jeu Pong" class="img">
          <p>Un jeu classique ! Utilisez votre raquette pour renvoyer la balle et marquer des points. Le jeu devient plus difficile à mesure que vous progressez. Évitez de laisser la balle passer !</p> <a href="Pong.php" class="btn">Jouer au Pong</a>
        </div>
        <div class="carousel-item responsive">
          <h3>Snake</h3> <img src="img/snake_pre.png" alt="Image du jeu snake" class="img">
          <p>Dans ce jeu, vous devez faire grandir le serpent le plus possible sans qu'il ne touche les murs ou sa propre queue en mangeant des objets</p> <a href="snake.php" class="btn">Jouer à Snake</a>
        </div>
        <div class="carousel-item responsive">
          <h3>Flappy Bird</h3> <img src="img/flappy.png" alt="Image du jeu flappy bird" class="img">
          <p>Dans ce jeu, le but est de contrôler un oiseau qui doit voler entre des tuyaux sans les toucher.</p> <a href="flappy_Bird.php" class="btn">Jouer à Flappy Bird</a>
        </div>
        <div class="carousel-item responsive">
          <h3>Memoire carte</h3> <img src="img/memorycard.png" alt="Image du jeu Memory card" class="img">
          <p>Dans ce jeu, vous devez trouver toutes les paires de cartes identiques en les retournant deux par deux.</p> <a href="Memoire_Carte.php" class="btn">Jouer au Memory Card</a>
        </div>
        <div class="carousel-item responsive">
          <h3>2048</h3> <img src="img/2048.png" alt="Image du jeu 2048" class="img">
          <p>Dans ce jeu, vous devez combiner des tuiles numérotées pour atteindre la tuile 2048. Chaque mouvement combine les tuiles de même valeur, doublant ainsi leur valeur</p> <a href="2048.php" class="btn">Jouer au 2048</a>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/caroussel.js"></script>

  </section>

  <!-- Section Meilleurs Scores -->
  <section id="scores" class="section">
    <h2>Meilleurs Scores</h2>
    <p>Consultez les classements et essayez de battre les meilleurs joueurs !</p>
    <a href="Meilleur_Score.php" class="btn">Voir les Meilleurs Scores</a>
  </section>

  <?php
  include 'php/PiedPage.php';  // Inclure la barre de navigation
  ?>

  <?php if ($showCookieBanner): ?>
    <div id="cookie-consent" style="display:block;">
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. Acceptez-vous l'utilisation de cookies ?</p>
        <form method="post">
            <button type="submit" name="accept">Accepter</button>
            <button type="submit" name="reject">Refuser</button>
        </form>
    </div>
  <?php endif; ?>

</body>

</html>
