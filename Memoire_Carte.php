<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>
    <link rel="stylesheet" href="css/Memoire_carte.css">
    <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
    <div id="game-info">
        <div class="scoreboard">
            <div id="timer">Temps restant : 50s</div>
            <div id="score">Score : 0</div>
        </div>
        <div id="game-board">
            <div class="card" data-card="img/operateur.png"></div>
            <div class="card" data-card="img/grue.png"></div>
            <div class="card" data-card="img/t-shirt.png"></div>
            <div class="card" data-card="img/journee-mondiale.png"></div>
            <div class="card" data-card="img/operateur.png"></div>
            <div class="card" data-card="img/grue.png"></div>
            <div class="card" data-card="img/t-shirt.png"></div>
            <div class="card" data-card="img/journee-mondiale.png"></div>
            <div class="card" data-card="img/feu.png"></div>
            <div class="card" data-card="img/monde.png"></div>
            <div class="card" data-card="img/montagne.png"></div>
            <div class="card" data-card="img/montgolfiere.png"></div>
            <div class="card" data-card="img/feu.png"></div>
            <div class="card" data-card="img/monde.png"></div>
            <div class="card" data-card="img/montagne.png"></div>
            <div class="card" data-card="img/montgolfiere.png"></div>
        </div>

        <script src="js/MemoryCard.js"></script>
        <?php
        include 'php/PiedPage.php';  // Inclure la barre de navigation
        ?>
</body>

</html>