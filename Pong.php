<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/Pong.css" rel="stylesheet">
  <title>Jeu du Pong</title>
  <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
  <div class="scoreboard">
    Score : <span id="score">0</span>
  </div>

  <canvas id="pong" width="600" height="400"></canvas>
  <button id="replayButton">Rejouer</button>
  <div id="tableau">
    <?php include 'TableauScorePong.php'; ?>
  </div>


  <script src="js/pong.js"></script>
  <script src="js/envoyerScore.js"></script>
  <?php
  include 'php/PiedPage.php';  // Inclure la barre de navigation
  ?>

</body>

</html>