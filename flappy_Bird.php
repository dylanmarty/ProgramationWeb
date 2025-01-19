<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/flappy_Bird.css">
    <link rel="icon" type="img/png" href="img/favicon.ico">
    <title>Flappy Bird</title>
    <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
    <div class="background"></div>
    <img src="img/Bird.png" alt="inbvalid-img" class="bird" id="bird-1">
    <div class="message">
        Entrer pour commencer le jeu <p><span style="color: red;">&uarr;</span>Flêche haut pour controler</p>

    </div>
    <div class="score scoreboard ">
        <span class="score_title"></span>
        <span class="score_val" id="score"></span>
    </div>
    <script src="js/flappy_Bird.js"></script>
    <script src="js/envoyerScore.js"></script>

    <?php
    include 'php/PiedPage.php';  // Inclure la barre de navigation
    ?>
</body>

</html>