const canvas = document.getElementById('pong');
const ctx = canvas.getContext('2d');
const boutonRejouer = document.getElementById('replayButton');

const largeurRaquette = 100, hauteurRaquette = 15;
const rayonBalle = 10;
let xRaquette = (canvas.width - largeurRaquette) / 2;
let vitesseRaquette = 10;
let droiteAppuyee = false, gaucheAppuyee = false;
let xBalle = canvas.width / 2, yBalle = canvas.height - 30;
let vitesseXBalle = 4, vitesseYBalle = -4;
let score = 0;
let accelerationEffectuee = false;

document.addEventListener('keydown', gestionToucheAppuyee, false);
document.addEventListener('keyup', gestionToucheRelachee, false);
boutonRejouer.addEventListener('click', resetJeu);

function gestionToucheAppuyee(e) {
  if (e.key === 'Right' || e.key === 'ArrowRight') {
    droiteAppuyee = true;
  } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
    gaucheAppuyee = true;
  }
}

function gestionToucheRelachee(e) {
  if (e.key === 'Right' || e.key === 'ArrowRight') {
    droiteAppuyee = false;
  } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
    gaucheAppuyee = false;
  }
}

function dessinerRaquette() {
  ctx.beginPath();
  ctx.rect(xRaquette, canvas.height - hauteurRaquette, largeurRaquette, hauteurRaquette);
  ctx.fillStyle = '#0095DD';
  ctx.fill();
  ctx.closePath();
}

function dessinerBalle() {
  ctx.beginPath();
  ctx.arc(xBalle, yBalle, rayonBalle, 0, Math.PI * 2);
  ctx.fillStyle = '#0095DD';
  ctx.fill();
  ctx.closePath();
}

function dessinerScore() {
  document.getElementById('score').textContent = score;
}

function detectionCollision() {
  if (xBalle + vitesseXBalle > canvas.width - rayonBalle || xBalle + vitesseXBalle < rayonBalle) {
    vitesseXBalle = -vitesseXBalle;
  }
  if (yBalle + vitesseYBalle < rayonBalle) {
    vitesseYBalle = -vitesseYBalle;
  } else if (yBalle + vitesseYBalle > canvas.height - rayonBalle) {
    if (xBalle > xRaquette && xBalle < xRaquette + largeurRaquette) {
      vitesseYBalle = -vitesseYBalle;
      score++;
     
      if (score % 5 === 0 && !accelerationEffectuee) {
        vitesseXBalle *= 1.1;
        vitesseYBalle *= 1.1;
        accelerationEffectuee = true; 
      }
    } else {
      finDeJeu();
    }
  }
}

function deplacerRaquette() {
  if (droiteAppuyee && xRaquette < canvas.width - largeurRaquette) {
    xRaquette += vitesseRaquette;
  } else if (gaucheAppuyee && xRaquette > 0) {
    xRaquette -= vitesseRaquette;
  }
}

function deplacerBalle() {
  xBalle += vitesseXBalle;
  yBalle += vitesseYBalle;
}

function finDeJeu() {
  xBalle = -rayonBalle;
  yBalle = -rayonBalle;
  boutonRejouer.style.display = 'block';
  envoyerScore('Pong');
}

function resetJeu() {
  score = 0;
  xBalle = canvas.width / 2;
  yBalle = canvas.height - 30;
  vitesseXBalle = 4;
  vitesseYBalle = -4;
  xRaquette = (canvas.width - largeurRaquette) / 2;
  boutonRejouer.style.display = 'none';
  accelerationEffectuee = false;
  dessiner();
}

function dessiner() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  dessinerBalle();
  dessinerRaquette();
  deplacerBalle();
  deplacerRaquette();
  detectionCollision();
  dessinerScore();
  requestAnimationFrame(dessiner);
}

dessiner();
