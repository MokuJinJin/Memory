<?php

require "vendor/autoload.php";
use \oclock\game\Memory;
use \oclock\game\utils\EnumDifficulty;
use \oclock\game\Board;

if(array_key_exists("difficulty", $_POST))
{
    $Difficulty = EnumDifficulty::getDifficultyFromText($_POST["difficulty"]);
}
else 
{
    $Difficulty = EnumDifficulty::Normal;
    $_POST["difficulty"] = "Normal";
}

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
<script src="js/surprise.js"></script>
<script src="js/memoryGame.js"></script>
<script src="js/index.main.js"></script>
</head>
<body>';

echo '<section class="boardGame">';
Board::printBoard($game);
echo '</section>';

echo '<section class="sablier">';
echo '<span id="countDown">affichage du temps restant ...</span>';
echo '<div id="progressBar" class="progressBar--back">
        <div class="progressBar--color"></div>
    </div>';
echo '</section>';

echo '<aside class="informations">';
Board::printDifficulty($_POST["difficulty"]);
Board::printHighScore($Difficulty);
echo '</aside>';

echo '<div id="winner-popup">';
echo '<p>Vous avez gagnez en <span id="winner-time"></span></p>';
echo '<input type="text" name="playerName" placeholder="Votre nick en 3 lettres" maxlength="3">';
echo '<input type="submit" value="Valider">';
echo '</div>';

echo '</body>
</html>';
