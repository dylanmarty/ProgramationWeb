<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MeilleurScores.css">
    <title>Meilleurs Scores Pong</title>
    <?php
    include 'BarreNavigation.php';
    ?>
</head>

<body>
    <div class="container" id="pong">
        <h1>Meilleurs Scores Jeu du Pong</h1>
        <table>
            <tbody>
                <?php
                include 'TableauScorePong.php';
                ?>
            </tbody>
        </table>
    </div>
    <div class="container" id="attrapeEtoile">
        <h1>Meilleurs Scores Jeu de l'attrapeEtoile</h1>
        <table>
            <tbody>
                <?php
                include 'TableauScoreAttrapeEtoiles.php';
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
