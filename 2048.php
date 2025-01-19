<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2048</title>
    <link rel="stylesheet" href="CSS/2048.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="img/png" href="img/jeu-de-plateau.png">
    <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>

<body>
    <h1>2048</h1>
    <hr>
    <div id="controls">
        <button id="undo" class="button"><i class="fas fa-undo-alt"></i></button>
        <button id="reset" class="button"><i class="fas fa-sync-alt"></i></button>
    </div>
    <div id="board"></div>
    <div class=" scoreboard ">
        <h2>Score: <span id="score">0</span></h2>
    </div>
    <script src="js/2048.js"></script>
    <script src="js/envoyerScore.js"></script>

    <?php
    include 'php/PiedPage.php';  // Inclure la barre de navigation
    ?>
</body>

</html>