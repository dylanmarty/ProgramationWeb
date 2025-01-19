let $gameArea = document.getElementById("gameArea");
let $scoreDisplay = document.getElementById("score");
let $livesDisplay = document.getElementById("lives");

let $score = 0;
let $vies = 3;
let $tempsIntervalle = 1500;
let $idIntervalle;

function mettreAJourTableau() { 
  $scoreDisplay.textContent = $score;
  $livesDisplay.textContent = $vies;
  $scoreDisplay.classList.add("score-change");
  $livesDisplay.classList.add("score-change");
  setTimeout(() => {
    $scoreDisplay.classList.remove("score-change");
    $livesDisplay.classList.remove("score-change");
  }, $tempsIntervalle);
}

function ajusterPositionEtoile($x, $y, etoileSize, gameAreaRect) {
  if ($x < 0) $x = 0;
  if ($y < 0) $y = 0;
  if ($x + etoileSize > gameAreaRect.width) $x = gameAreaRect.width - etoileSize;
  if ($y + etoileSize > gameAreaRect.height) $y = gameAreaRect.height - etoileSize;
  return { x: $x, y: $y };
}

function creerEtoile() {
  const $gameArea = document.getElementById("gameArea");
  const gameAreaRect = $gameArea.getBoundingClientRect();

  let $etoile = document.createElement("div");
  $etoile.classList.add("star");

  const etoileSize = 50;
  let $x = Math.random() * (gameAreaRect.width - etoileSize);
  let $y = Math.random() * (gameAreaRect.height - etoileSize);

  let { x: adjustedX, y: adjustedY } = ajusterPositionEtoile($x, $y, etoileSize, gameAreaRect);

  console.log(`Position de l'étoile : X = ${adjustedX}, Y = ${adjustedY}`);  
  
  $etoile.style.position = "absolute";
  $etoile.style.left = `${adjustedX}px`;
  $etoile.style.top = `${adjustedY}px`;

  $gameArea.appendChild($etoile);

  $etoile.addEventListener("click", () => {
    $score++;
    mettreAJourTableau();
    $etoile.remove();
    if ($score % 10 === 0) {
      augmenterVitesse();
    }
  });

  setTimeout(() => {
    if ($gameArea.contains($etoile)) {
      $etoile.remove();
      $vies--;
      mettreAJourTableau();
      if ($vies <= 0) {
        envoyerScore("AttrapeEtoile");
        alert(`Jeu terminé ! Score final : ${$score}`);
        recommencerJeu();
      }
    }
  }, 2000);
}

function augmenterVitesse() {
  if ($tempsIntervalle > 500) {
    $tempsIntervalle -= 200;
    clearInterval($idIntervalle);
    $idIntervalle = setInterval(creerEtoile, $tempsIntervalle);
    console.log(`Nouvelle vitesse : ${$tempsIntervalle}ms`);
  }
}

function recommencerJeu() {
  let $etoiles = document.querySelectorAll(".star");
  $etoiles.forEach($etoile => $etoile.remove());
  $score = 0;
  $vies = 3;
  $tempsIntervalle = 1500;
  clearInterval($idIntervalle);
  $idIntervalle = setInterval(creerEtoile, $tempsIntervalle);
  mettreAJourTableau();
}

$idIntervalle = setInterval(creerEtoile, $tempsIntervalle);
