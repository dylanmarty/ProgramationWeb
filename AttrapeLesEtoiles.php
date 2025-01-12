<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="CSS/AttrapeLesEtoiles.css" rel="stylesheet">
  <title>Attrape les Étoiles</title>
</head>
<body>
  <div class="scoreboard">
    Score : <span id="score">0</span> | Vies : <span id="lives">3</span>
  </div>
  <div class="game-area" id="gameArea"></div>

  <script>
    let $gameArea = document.getElementById("gameArea")
    let $scoreDisplay = document.getElementById("score")
    let $livesDisplay = document.getElementById("lives")

    let $score = 0
    let $vies = 3
    let $tempsIntervalle = 1500
    let $idIntervalle

    function mettreAJourTableau() { 
      $scoreDisplay.textContent = $score
      $livesDisplay.textContent = $vies
      $scoreDisplay.classList.add("score-change")
      $livesDisplay.classList.add("score-change")
      setTimeout(() => {
        $scoreDisplay.classList.remove("score-change")
        $livesDisplay.classList.remove("score-change")
      }, $tempsIntervalle)
    }

    function creerEtoile() {
      let $etoile = document.createElement("div")
      $etoile.classList.add("star")
      let $x = Math.random() * (window.innerWidth - 50)
      let $y = Math.random() * (window.innerHeight - 50)
      $etoile.style.left = `${$x}px`
      $etoile.style.top = `${$y}px`
      $gameArea.appendChild($etoile)
      $etoile.addEventListener("click", () => {
        $score++
        mettreAJourTableau()
        $etoile.remove()
        if ($score % 10 === 0) {
          augmenterVitesse()
        }
      })
      setTimeout(() => {
        if ($gameArea.contains($etoile)) {
          $etoile.remove()
          $vies--
          mettreAJourTableau()
          if ($vies <= 0) {
            alert(`Jeu terminé ! Score final : ${$score}`)
            recommencerJeu()
          }
        }
      }, 2000)
    }

    function augmenterVitesse() {
      if ($tempsIntervalle > 500) {
        $tempsIntervalle -= 200
        clearInterval($idIntervalle)
        $idIntervalle = setInterval(creerEtoile, $tempsIntervalle)
        console.log(`Nouvelle vitesse : ${$tempsIntervalle}ms`)
      }
    }

    function recommencerJeu() {
      let $etoiles = document.querySelectorAll(".star")
      $etoiles.forEach($etoile => $etoile.remove())
      $score = 0
      $vies = 3
      $tempsIntervalle = 1500
      clearInterval($idIntervalle)
      $idIntervalle = setInterval(creerEtoile, $tempsIntervalle)
      mettreAJourTableau()
    }

    $idIntervalle = setInterval(creerEtoile, $tempsIntervalle)
  </script>
</body>
</html>
