<?php

require "vendor/autoload.php";
use \oclock\game\Memory;
use \oclock\game\utils\EnumDifficulty;
use \oclock\game\Board;

$game = new Memory(EnumDifficulty::Easy);

echo '<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style/cards.css">
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
<script src="js/fruitCard.js"></script>
<script src="js/cardPair.js"></script>
<script src="js/difficulty.js"></script>
<script src="js/memoryGame.js"></script>
<script src="js/index.main.js"></script>
<script src="js/index.event.js"></script>
</head>
<body>';

Board::printBoard($game);

echo '</body>
</html>';
