let score = 0;
//tableau
let blockSize = 25;
let rows = 20;
let cols = 20;
let board;
let context;

//snake head
let snakeX = blockSize * 5;
let snakeY = blockSize * 5;

let velocityX = 0;
let velocityY = 0;

let snakeBody = [];

//food
let foodX;
let foodY;

let gameOver = false;

let message = document.querySelector('.message');
message.classList.add('messageStyle');

// Démarrer le jeu
function demarrer(e) {
    if (e.key == "Enter" || e.type == "touchstart") {

        snakeX = blockSize * 5;
        snakeY = blockSize * 5;
        velocityX = 0;
        velocityY = 0;
        snakeBody = [];
        envoyerScore('Snake');
        score = 0;

        document.getElementById("score").innerText = score;
        gameOver = false;
        placeFood();
        message.innerHTML = '';
        message.classList.remove('messageStyle');
        play();
    }
}

document.addEventListener('keydown', (e) => {
    demarrer(e);
});
document.addEventListener('touchstart', (e) => {
    demarrer(e);
});

function incrementScore() {
    score++;
    document.getElementById("score").innerText = score;
}

window.onload = function play() {
    board = document.getElementById("board");
    board.height = rows * blockSize;
    board.width = cols * blockSize;
    context = board.getContext("2d");

    placeFood();
    document.addEventListener("keyup", changeDirection);
    board.addEventListener("touchstart", handleTouchStart);
    board.addEventListener("touchmove", handleTouchMove);
    setInterval(update, 1000 / 10); // 100 millisecondes
}

function adjustBoardSize() {
    let deviceWidth = window.innerWidth;
    let deviceHeight = window.innerHeight;
    let minDimension = Math.min(deviceWidth, deviceHeight);
    blockSize = Math.floor(minDimension / 20);
    board.height = rows * blockSize;
    board.width = cols * blockSize;
}

function update() {
    if (gameOver) {
        return;
    }
    context.fillStyle = "black";
    context.fillRect(0, 0, board.width, board.height);

    context.fillStyle = "red";
    context.fillRect(foodX, foodY, blockSize, blockSize);

    if (snakeX == foodX && snakeY == foodY) {
        snakeBody.push([foodX, foodY]);
        placeFood();
        incrementScore();
    }

    for (let i = snakeBody.length - 1; i > 0; i--) {
        snakeBody[i] = snakeBody[i - 1];
    }
    if (snakeBody.length) {
        snakeBody[0] = [snakeX, snakeY];
    }

    context.fillStyle = "lime";
    snakeX += velocityX * blockSize;
    snakeY += velocityY * blockSize;
    context.fillRect(snakeX, snakeY, blockSize, blockSize);

    for (let i = 0; i < snakeBody.length; i++) {
        context.fillRect(snakeBody[i][0], snakeBody[i][1], blockSize, blockSize);
    }

    // condition de fin de jeu
    if (snakeX < 0 || snakeX >= cols * blockSize || snakeY < 0 || snakeY >= rows * blockSize) {
        gameOver = true;
        message.innerHTML = 'Game Over'.fontcolor('red') + '<br>Appuyer sur Entrer pour Recommencer';
        message.classList.add('messageStyle');
        return;
    }
    for (let i = 0; i < snakeBody.length; i++) {
        if (snakeX == snakeBody[i][0] && snakeY == snakeBody[i][1]) {
            gameOver = true;
            message.innerHTML = 'Game Over'.fontcolor('red') + '<br>Appuyer sur Entrer pour Recommencer';
            message.classList.add('messageStyle');
            return;
        }
    }
}

function changeDirection(e) {
    if (e.code == "ArrowUp" && velocityY != 1) {
        velocityX = 0;
        velocityY = -1;
    }
    else if (e.code == "ArrowDown" && velocityY != -1) {
        velocityX = 0;
        velocityY = 1;
    }
    else if (e.code == "ArrowLeft" && velocityX != 1) {
        velocityX = -1;
        velocityY = 0;
    }
    else if (e.code == "ArrowRight" && velocityX != -1) {
        velocityX = 1;
        velocityY = 0;
    }
}
function handleTouchStart(e) {
    if (e.touches.length == 1) {
        let touch = e.touches[0];
        startX = touch.clientX;
        startY = touch.clientY;
    }
}

function handleTouchMove(e) {
    if (e.touches.length == 1) {
        let touch = e.touches[0];
        let deltaX = touch.clientX - startX;
        let deltaY = touch.clientY - startY;

        if (Math.abs(deltaX) > Math.abs(deltaY)) {
            if (deltaX > 0 && velocityX != -1) {
                velocityX = 1;
                velocityY = 0;
            } else if (deltaX < 0 && velocityX != 1) {
                velocityX = -1;
                velocityY = 0;
            }
        } else {
            if (deltaY > 0 && velocityY != -1) {
                velocityX = 0;
                velocityY = 1;
            } else if (deltaY < 0 && velocityY != 1) {
                velocityX = 0;
                velocityY = -1;
            }
        }
    }
}

function placeFood() {
    foodX = Math.floor(Math.random() * cols) * blockSize;
    foodY = Math.floor(Math.random() * rows) * blockSize;
}