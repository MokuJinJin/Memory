<?php

require "vendor/autoload.php";
use \oclock\game\Memory;
use \oclock\game\utils\EnumDifficulty;
use \oclock\game\Board;

$Difficulty = EnumDifficulty::Debug;

$game = new Memory($Difficulty);

echo '<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style/cards.css">

<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

<script src="js/ajax/highScore.js"></script>
<script src="js/fruitCard.js"></script>
<script src="js/cardPair.js"></script>
<script src="js/difficulty.js"></script>
<script src="js/countdown.js"></script>
<script src="js/memoryGame.js"></script>
<script src="js/index.main.js"></script>
</head>
<body>
<br>';

Board::printBoard($game);



echo '<span id="countDown">affichage du temps restant ...</span>';
echo '<div id="progressBar" class="progressBar--back">
        <div class="progressBar--color"></div>
    </div>';

Board::printHighScore($Difficulty);

echo '</body>
</html>';
