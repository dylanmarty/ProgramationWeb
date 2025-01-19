let board;
let score = 0;
let rows = 4;
let colums = 4;
let previousBoard;
let previousScore;

window.onload = function () {
    setGame();
    document.getElementById("undo").addEventListener("click", undo);
    document.getElementById("reset").addEventListener("click", resetGame);
}

function setGame() {
    board = [
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0]
    ]
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < colums; c++) {
            let tile = document.createElement("div");
            tile.id = r.toString() + "-" + c.toString();
            let num = board[r][c];
            updateTile(tile, num);
            document.getElementById("board").append(tile);
        }
    }
    setTwo();
    setTwo();
}
document.addEventListener('keyup', (e) => {
    saveState();
    if (e.code == "ArrowLeft") {
        slideLeft();
        setTwo();
    }
    else if (e.code == "ArrowRight") {
        slideRight();
        setTwo();
    }
    else if (e.code == "ArrowUp") {
        slideUp();
        setTwo();
    }
    else if (e.code == "ArrowDown") {
        slideDown();
        setTwo();
    }
    document.getElementById("score").innerText = score;
});

function saveState() {
    previousBoard = board.map(row => row.slice());
    previousScore = score;
}

function undo() {
    if (previousBoard) {
        board = previousBoard.map(row => row.slice());
        score = previousScore;
        updateBoard();
        document.getElementById("score").innerText = score;
    }
}

function resetGame() {
    board = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    score = 0; updateBoard();
    setTwo();
    setTwo();
    document.getElementById("score").innerText = score;
}
function updateBoard() {
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < colums; c++) {
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}
function setTwo() {
    if (!hasEmptyTile()) {
        return;
    }

    let found = false;
    while (!found) {
        //random r,c
        let r = Math.floor(Math.random() * rows); //0-1*4-> 0,3
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
    tile.innerText = "";
    tile.classList.value = ""; //clear the classList
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
    return row.filter(num => num != 0);
}

function slide(row) {
    //[0,2,2,2]
    row = filterZero(row); //get rid of zeroes ->[2,2,2]

    //slide
    for (let i = 0; i < row.length; i++) {
        //check every 2
        if (row[i] == row[i + 1]) {
            row[i] *= 2;
            row[i + 1] = 0;
            score += row[i];
        }//[2,2,2]->[4,0,2]
    }
    row = filterZero(row);

    //add zeroes
    while (row.length < colums) {
        row.push(0);
    }//[4,2,0,0]
    return row;
}

function slideLeft() {
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
    for (let c = 0; c < colums; c++) {
        let row = [board[0][c], board[1][c], board[2][c], board[3][c]];
        row = slide(row);
        // board[0][c] = row[0];
        // board[1][c] = row[1];
        // board[2][c] = row[2];
        // board[3][c] = row[3];
        for (let r = 0; r < rows; r++) {
            board[r][c] = row[r];
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}


function slideDown() {
    for (let c = 0; c < colums; c++) {
        let row = [board[0][c], board[1][c], board[2][c], board[3][c]];
        row.reverse();
        row = slide(row);
        row.reverse();
        // board[0][c] = row[0];
        // board[1][c] = row[1];
        // board[2][c] = row[2];
        // board[3][c] = row[3];
        for (let r = 0; r < rows; r++) {
            board[r][c] = row[r];
            let tile = document.getElementById(r.toString() + "-" + c.toString());
            let num = board[r][c];
            updateTile(tile, num);
        }
    }
}