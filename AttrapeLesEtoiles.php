<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/AttrapeLesEtoiles.css" rel="stylesheet">
  <title>Attrape les Étoiles</title>
  <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
  <div class="scoreboard">
    Score : <span id="score">0</span> | Vies : <span id="lives">3</span>
  </div>
  <div class="game-area" id="gameArea"></div>

  <div id="tableau">
    <?php include 'TableauScoreAttrapeEtoiles.php'; ?>
  </div>

  <?php
  include 'php/PiedPage.php';  // Inclure la barre de navigation
  ?>
  
  <script src="js/attrapeLesEtoiles.js"></script>
  <script src="js/envoyerScore.js"></script>
</body>
</html>
