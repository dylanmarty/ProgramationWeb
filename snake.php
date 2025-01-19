<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake</title>
    <link rel="stylesheet" href="CSS/snake.css">
    <link rel="icon" type="img/png" href="img/snake.jpg">
    <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
    <div class="container">
        <div id="author">
            <h1>Snake</h1>
        </div>
        <div class="message">
            Entrer pour commencer le jeu <p><span style="color: red;">&uarr;</span>Flêche directionnel pour controler
            </p>
        </div>
        <canvas id="board"></canvas>
        <div id="ui">
            <h2>SCORE</h2>
            <br>
            <span id="score">00</span>
        </div>
    </div>
    <script src="js/snake.js"></script>
    <script src="js/envoyerScore.js"></script>
    <?php
    include 'php/PiedPage.php';  // Inclure la barre de navigation
    ?>
</body>

</html>