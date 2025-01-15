<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/Pong.css" rel="stylesheet">
  <title>Jeu du Pong</title>
  <?php include 'BarreNavigation.php'; ?>
</head>

<body>
  <div class="scoreboard">
    Score : <span id="score">0</span>
  </div>

  <canvas id="pong" width="600" height="400"></canvas>
  <button id="replayButton">Rejouer</button>


  <?php
    include 'ConfigBaseDonnees.php';

    // Connexion à la base de données
    $conn = new mysqli($host, $username, $password, $dbname);

    // Vérifier si la connexion est réussie
    if ($conn->connect_error) {
    die("Échec de connexion à la base de données : " . $conn->connect_error);
  }
        $req = $conn->prepare("SELECT Prenom, Pong from Utilisateurs INNER JOIN MeilleursScores on MeilleursScores.ID = Utilisateurs.ID ORDER BY Pong");
        $req->execute();
        $req->store_result();
  ?>

  <script>
    const canvas = document.getElementById('pong');
    const ctx = canvas.getContext('2d');
    const replayButton = document.getElementById('replayButton');

    const paddleWidth = 100, paddleHeight = 15;
    const ballRadius = 10;
    let paddleX = (canvas.width - paddleWidth) / 2;
    let paddleSpeed = 10;
    let rightPressed = false, leftPressed = false;
    let ballX = canvas.width / 2, ballY = canvas.height - 30;
    let ballSpeedX = 4, ballSpeedY = -4;
    let score = 0;

    // Gestion des événements du clavier
    document.addEventListener('keydown', keyDownHandler, false);
    document.addEventListener('keyup', keyUpHandler, false);

    // Clic sur "Rejouer"
    replayButton.addEventListener('click', resetGame);

    function keyDownHandler(e) {
      if (e.key === 'Right' || e.key === 'ArrowRight') {
        rightPressed = true;
      } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
        leftPressed = true;
      }
    }

    function keyUpHandler(e) {
      if (e.key === 'Right' || e.key === 'ArrowRight') {
        rightPressed = false;
      } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
        leftPressed = false;
      }
    }

    function drawPaddle() {
      ctx.beginPath();
      ctx.rect(paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
      ctx.fillStyle = '#0095DD';
      ctx.fill();
      ctx.closePath();
    }

    function drawBall() {
      ctx.beginPath();
      ctx.arc(ballX, ballY, ballRadius, 0, Math.PI * 2);
      ctx.fillStyle = '#0095DD';
      ctx.fill();
      ctx.closePath();
    }

    function drawScore() {
      document.getElementById('score').textContent = score;
    }

    function collisionDetection() {
      if (ballX + ballSpeedX > canvas.width - ballRadius || ballX + ballSpeedX < ballRadius) {
        ballSpeedX = -ballSpeedX;
      }
      if (ballY + ballSpeedY < ballRadius) {
        ballSpeedY = -ballSpeedY;
      } else if (ballY + ballSpeedY > canvas.height - ballRadius) {
        if (ballX > paddleX && ballX < paddleX + paddleWidth) {
          ballSpeedY = -ballSpeedY;
          score++;
          if (score % 5 === 0) {
            ballSpeedX *= 1.1;
            ballSpeedY *= 1.1;
          }
        } else {
          gameOver();
        }
      }
    }

    function movePaddle() {
      if (rightPressed && paddleX < canvas.width - paddleWidth) {
        paddleX += paddleSpeed;
      } else if (leftPressed && paddleX > 0) {
        paddleX -= paddleSpeed;
      }
    }

    function moveBall() {
      ballX += ballSpeedX;
      ballY += ballSpeedY;
    }

    function gameOver() {
      // Supprimer la balle avant d'afficher le bouton "Rejouer"
      ballX = -ballRadius; // Déplacer la balle hors de la zone visible
      ballY = -ballRadius;
      replayButton.style.display = 'block'; // Afficher le bouton "Rejouer"
    }

    function resetGame() {
      score = 0;
      ballX = canvas.width / 2;
      ballY = canvas.height - 30;
      ballSpeedX = 4;
      ballSpeedY = -4;
      paddleX = (canvas.width - paddleWidth) / 2; // Réinitialiser la position de la palette
      replayButton.style.display = 'none'; // Cacher le bouton "Rejouer"
      draw(); // Redémarrer le jeu
    }

    function draw() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      drawBall();
      drawPaddle();
      moveBall();
      movePaddle();
      collisionDetection();
      drawScore();
      requestAnimationFrame(draw);
    }

    draw(); // Démarrer le jeu
  </script>

</body>
</html>
