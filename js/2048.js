let board;
let score = 0;
let rows = 4;
let colums = 4;
let previousBoard;
let previousScore;

window.onload = function () {
    setGame(); // Initialise le jeu
    document.getElementById("undo").addEventListener("click", undo);
    document.getElementById("reset").addEventListener("click", resetGame);
    addTouchListeners();
}

function setGame() {
    // Initialise le tableau de jeu avec des zéros
    board = [
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0]
    ]
    // Crée les tuiles du jeu et les ajoute au DOM
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < colums; c++) {
            let tile = document.createElement("div");
            tile.id = r.toString() + "-" + c.toString();
            let num = board[r][c];
            updateTile(tile, num);
            document.getElementById("board").append(tile);
        }
    }
    setTwo(); // Ajoute une tuile "2" aléatoire
    setTwo(); // Ajoute une autre tuile "2" aléatoire
}

document.addEventListener('keyup', (e) => {
    saveState(); // Sauvegarde l'état actuel du jeu
    if (e.code == "ArrowLeft") {
        slideLeft(); // Glisse les tuiles vers la gauche
        setTwo(); // Ajoute une tuile "2" aléatoire
    }
    else if (e.code == "ArrowRight") {
        slideRight(); // Glisse les tuiles vers la droite
        setTwo(); // Ajoute une tuile "2" aléatoire
    }
    else if (e.code == "ArrowUp") {
        slideUp(); // Glisse les tuiles vers le haut
        setTwo(); // Ajoute une tuile "2" aléatoire
    }
    else if (e.code == "ArrowDown") {
        slideDown(); // Glisse les tuiles vers le bas
        setTwo(); // Ajoute une tuile "2" aléatoire
    }
    document.getElementById("score").innerText = score; // Met à jour le score affiché
});

function saveState() {
    // Sauvegarde l'état actuel du tableau et du score
    previousBoard = board.map(row => row.slice());
    previousScore = score;
}

function undo() {
    // Restaure l'état précédent du tableau et du score
    if (previousBoard) {
        board = previousBoard.map(row => row.slice());
        score = previousScore;
        updateBoard();
        document.getElementById("score").innerText = score;
    }
}

function resetGame() {
    // Réinitialise le jeu
    board = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    envoyerScore("2048");
    score = 0;
    updateBoard();
    setTwo();
    setTwo();
    document.getElementById("score").innerText = score;
}

function updateBoard() {
    // Met à jour l'affichage des tuiles en fonction du tableau
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < colums; c++) {
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}

function setTwo() {
    // Ajoute une tuile "2" aléatoire dans une case vide
    if (!hasEmptyTile()) {
        return;
    }

    let found = false;
    while (!found) {
        let r = Math.floor(Math.random() * rows);
        let c = Math.floor(Math.random() * colums);

        if (board[r][c] == 0) {
            board[r][c] = 2;
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            tile.innerText = "2";
            tile.classList.add("x2");
            found = true;
        }
    }
}

function hasEmptyTile() {
    // Vérifie s'il y a des cases vides dans le tableau
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < colums; c++) {
            if (board[r][c] == 0) {
                return true;
            }
        }
    }
    return false;
}

function updateTile(tile, num) {
    // Met à jour l'affichage d'une tuile en fonction de sa valeur
    tile.innerText = "";
    tile.classList.value = "";
    tile.classList.add("tile");
    if (num > 0) {
        tile.innerText = num;
        if (num <= 4096) {
            tile.classList.add("x" + num.toString())
        }
        else {
            tile.classList.add("x8192");
        }
    }
}

function filterZero(row) {
    // Filtre les zéros d'une ligne
    return row.filter(num => num != 0);
}

function slide(row) {
    // Glisse et combine les tuiles d'une ligne
    row = filterZero(row);

    for (let i = 0; i < row.length; i++) {
        if (row[i] == row[i + 1]) {
            row[i] *= 2;
            row[i + 1] = 0;
            score += row[i];
        }
    }
    row = filterZero(row);

    while (row.length < colums) {
        row.push(0);
    }
    return row;
}

function slideLeft() {
    // Glisse les tuiles vers la gauche pour chaque ligne
    for (let r = 0; r < rows; r++) {
        let row = board[r];
        row = slide(row);
        board[r] = row;

        for (let c = 0; c < colums; c++) {
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}

function slideRight() {
    // Glisse les tuiles vers la droite pour chaque ligne
    for (let r = 0; r < rows; r++) {
        let row = board[r];
        row.reverse();
        row = slide(row);
        row.reverse();
        board[r] = row;

        for (let c = 0; c < colums; c++) {
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}

function slideUp() {
    // Glisse les tuiles vers le haut pour chaque colonne
    for (let c = 0; c < colums; c++) {
        let row = [board[0][c], board[1][c], board[2][c], board[3][c]];
        row = slide(row);
        for (let r = 0; r < rows; r++) {
            board[r][c] = row[r];
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}

function slideDown() {
    // Glisse les tuiles vers le bas pour chaque colonne
    for (let c = 0; c < colums; c++) {
        let row = [board[0][c], board[1][c], board[2][c], board[3][c]];
        row.reverse();
        row = slide(row);
        row.reverse();
        for (let r = 0; r < rows; r++) {
            board[r][c] = row[r];
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}

function addTouchListeners() {
    let touchstartX = 0;
    let touchstartY = 0;
    let touchendX = 0;
    let touchendY = 0;
    document.addEventListener('touchstart', function (event) {
        touchstartX = event.changedTouches[0].screenX;
        touchstartY = event.changedTouches[0].screenY;
    },
        false);

    $document.addEventListener('touchend', function (event) {
        touchendX = event.changedTouches[0].screenX;
        touchendY = event.changedTouches[0].screenY;
        handleGesture();
    }, false);
    function handleGesture() {
        saveState();
        if (touchendX < touchstartX) {
            slideLeft();

        } if (touchendX > touchstartX) {
            slideRight();

        } if (touchendY < touchstartY) {
            slideUp();

        } if (touchendY > touchstartY) {
            slideDown();

        } setTwo();
        document.getElementById("score").innerText = score;
    }
}

