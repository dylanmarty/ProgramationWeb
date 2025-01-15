<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>
    <link rel="stylesheet" href="css/Memoire carte.css">
</head>
<body>
    <div id="game-info">
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
        
    </div>
    
    <script>
            const cards = document.querySelectorAll('.card');
            const timerDisplay = document.getElementById('timer');
            const scoreDisplay = document.getElementById('score');

            let flippedCards = [];
            let matchedCards = [];
            let attempts = 0;
            let timer = 50;  // 50 secondes
            let gameInterval;
            let timerInterval;

            // Fonction pour démarrer le timer
            function startTimer() {
                timerInterval = setInterval(function() {
                    timer--;
                    timerDisplay.textContent = `Temps restant : ${timer}s`;

                    if (timer <= 0) {
                        clearInterval(timerInterval);
                        endGame();
                    }
                }, 1000);  // Décrémenter toutes les secondes
            }

            // Fonction pour terminer le jeu
            function endGame() {
                alert(`Temps écoulé ! Vous avez trouvé ${matchedCards.length / 2} paires.`);
                setTimeout(() => {
                    location.reload();  // Recharge la page pour recommencer le jeu
                }, 1000);
            }

            function flipCard() {
                if (flippedCards.length === 2) return; // On ne peut retourner que deux cartes à la fois

                const card = this;
                const cardImage = card.dataset.card;  // Utiliser card.dataset.card pour récupérer l'attribut 'data-card'
                card.classList.add('flipped');
                card.style.backgroundImage = `url('${cardImage}')`;

                flippedCards.push(card);

                if (flippedCards.length === 2) {
                    attempts++;
                    setTimeout(checkMatch, 1000); // Attendre 1 seconde avant de vérifier les cartes
                }
            }

            function checkMatch() {
                const [firstCard, secondCard] = flippedCards;

                if (firstCard.dataset.card === secondCard.dataset.card) {
                    // Si les cartes correspondent
                    matchedCards.push(firstCard, secondCard);
                    scoreDisplay.textContent = `Score : ${matchedCards.length / 2}`;  // Mise à jour du score
                    flippedCards = [];
                    if (matchedCards.length === cards.length) {
                        setTimeout(() => alert(`Félicitations ! Vous avez trouvé toutes les paires en ${attempts} tentatives !`), 500);
                    }
                } else {
                    // Si les cartes ne correspondent pas
                    firstCard.classList.remove('flipped');
                    secondCard.classList.remove('flipped');
                    flippedCards = [];
                }
            }

            function shuffleCards() {
                const shuffled = Array.from(cards);
                shuffled.sort(() => Math.random() - 0.5); // Mélange les cartes aléatoirement

                shuffled.forEach((card, index) => {
                    // On affecte un nouvel ordre aux cartes dans le DOM
                    card.style.order = index;
                });
            }

            cards.forEach(card => card.addEventListener('click', flipCard));
            shuffleCards();

            // Démarrer le timer au début du jeu
            startTimer();
    </script>
</body>
</html>