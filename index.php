<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/Style.css" rel="stylesheet">
  <title>ENSIMgames</title>
</head>

<body>

  <?php
  include 'BarreNavigation.php';  // Inclure la barre de navigation
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

    <!--
    <h3>Attrape les Étoiles</h3>
    <img src="img/AttrapeEtoiles.png" alt="Image du jeu Attrape Etoiles">
    <p>Dans ce jeu, vous devez attraper des étoiles qui tombent du ciel pour marquer des points. Soyez rapide et attentif, car les étoiles tombent de plus en plus vite !</p>
    <a href="AttrapeLesEtoiles.php" class="btn">Jouer à Attrape les Étoiles</a>

    <h3>Pong</h3>
    <img src="img/Pong.png" alt="Image du jeu Pong">
    <p>Un jeu classique ! Utilisez votre raquette pour renvoyer la balle et marquer des points. Le jeu devient plus difficile à mesure que vous progressez. Évitez de laisser la balle passer !</p>
    <a href="Pong.php" class="btn">Jouer au Pong</a>

    <h3>Memoire carte</h3>
    <img src="img/AttrapeEtoiles.png" alt="Image du jeu Attrape Etoiles">
    <p>Dans ce jeu, vous devez trouver toutes les paires de cartes identiques en les retournant deux par deux.</p>
    <a href="Memoire_Carte.php" class="btn">Jouer à Memoire carte</a>
    -->

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
          <h3>Memoire carte</h3> <img src="img/memorycard.png" alt="Image du jeu Memory card" class="img">
          <p>Dans ce jeu, vous devez trouver toutes les paires de cartes identiques en les retournant deux par deux.</p> <a href="Memoire_Carte.php" class="btn">Jouer à Memoire carte</a>
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
</body>

</html>