<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MeilleurScores.css">
    <title>Meilleurs Scores</title>
    <?php
    include 'php/BarreNavigation.php';  // Inclure la barre de navigation
    ?>
</head>
<body>
    <div class="grid-container">
        <!-- Ligne 1 du tableau (3 colonnes) -->
        <div class="game-container">
            <div class="game" id="pong">
                <h1 class="tab">Jeu du Pong</h1>
                <table>
                    <tbody>
                        <?php include 'TableauScorePong.php'; ?>
                    </tbody>
                </table>
            </div>

            <div class="game" id="attrapeEtoile">
                <h1 class="tab">Jeu de l'Attrape Etoile</h1>
                <table>
                    <tbody>
                        <?php include 'TableauScoreAttrapeEtoiles.php'; ?>
                    </tbody>
                </table>
            </div>

            <div class="game" id="snake">
                <h1 class="tab">Jeu du Snake</h1>
                <table>
                    <tbody>
                        <?php include 'php/TableauScoresnake.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ligne 2 du tableau (2 colonnes) -->
        <div class="game-container">
            <div class="game" id="j_2048">
                <h1 class="tab">Jeu du 2048</h1>
                <table>
                    <tbody>
                        <?php include 'php/TableauScore2048.php'; ?>
                    </tbody>
                </table>
            </div>

            <div class="game" id="flappy_Bird">
                <h1 class="tab">Jeu du Flappy Bird</h1>
                <table>
                    <tbody>
                        <?php include 'php/TableauScoreflappy_bird.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
  include 'php/PiedPage.php';  // Inclure la barre de navigation
  ?>
</body>
</html>
