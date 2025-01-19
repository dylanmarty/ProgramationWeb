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
    <div class="grid-container">
        <div class="container" id="pong">
            <h1 class="tab">Jeu du Pong</h1>
            <table>
                <tbody>
                    <?php include 'TableauScorePong.php'; ?>
                </tbody>
            </table>
        </div>
        <div class="container" id="attrapeEtoile">
            <h1 class="tab">Jeu de l'attrapeEtoile</h1>
            <table>
                <tbody>
                    <?php include 'TableauScoreAttrapeEtoiles.php'; ?>
                </tbody>
            </table>
        </div>
        <div class="container" id="snake">
            <h1 class="tab">Jeu du Snake</h1>
            <table>
                <tbody>
                    <?php include 'TableauScoresnake.php'; ?>
                </tbody>
            </table>
        </div>
        <div class="container" id="flappy_Bird">
            <h1 class="tab">Jeu du Flappy Bird</h1>
            <table>
                <tbody>
                    <?php include 'TableauScoreflappy_bird.php'; ?>
                </tbody>
            </table>
        </div>
        <div class="container" id="j_2048">
            <h1 class="tab">Jeu du 2048</h1>
            <table>
                <tbody>
                    <?php include 'TableauScore2048.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>