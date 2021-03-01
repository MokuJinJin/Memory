<?php namespace oclock\game;

use \oclock\game\bdd\DAL;
use \oclock\game\utils\Utilitaire;
use \oclock\game\utils\EnumDifficulty;

/**
 * Classe qui crée le plateau de jeu
 */
class Board {
    
    /**
     * Nombre de ligne voulu sur le plateau de jeu
     */
    const numberRows = 4;

    /**
     * Génère le plateau de jeu HTML
     *
     * @param  Memory $game Paramètre du jeu
     * @return void
     */
    public static function printBoard($game, $includeCardTitle = false)
    {
        /* Calcul du nombre de ligne et colonne en fonction du nombre de cartes */
        $numberOfCards = count($game->cards);
        $rows = $numberOfCards / Board::numberRows;
        $cols = $numberOfCards / $rows;
        
        echo '<table id="Game" data-pair="'.$game->numberOfPair.'" data-seconds="'.$game->timeToResolve.'"><tr>';
        foreach ($game->cards as $id => $card) {
            
            Board::printCard($id, $card->cardName, $includeCardTitle);
            
            if (($id+1) % $rows == 0) {echo '</tr><tr>';}
		}
        
        echo '</tr></table>';
		
    }
        
    /**
     * printCard
     *
     * @param  int $id
     * @param  string $cardName
     * @return void
     */
    public static function printCard($id, $cardName, $includeTitle = false){
        echo '<td class="card" id="'.$id.'" data-fruit="'.$cardName.'"';
        if ($includeTitle) {echo ' title="'.$cardName.'"';}
        echo ">";
        echo '<div class="backCard"></div>    
                <div class="visualCard card--'.$cardName.'" ></div>
        </td>
        ';
    }
    
    /**
     * printHighScore
     *
     * @param  EnumDifficulty $difficulty Niveau de difficulté
     * @param  int $nombre Nombre de meilleurs HighScore à afficher
     * @return void
     */
    public static function printHighScore($difficulty, $nombre = 3){
        $bestHighScore = DAL::GetBestHighScoreForDifficulty($difficulty, $nombre);

        echo '<div id="high-score">';
        echo '<p>Les meilleurs scores :</p>';

        if (count($bestHighScore) == 0) {
            echo "<span class=\"text--aucun-score\">Aucun score pour l'instant :'(</span>";
        }

        echo '<ol>';
        foreach ($bestHighScore as $key => $highScore) {
            echo '<li id="high-score--'.$key.'">';
            echo '<span>'.$highScore->PlayerName.'</span>';
            echo ' en <span>'.Utilitaire::transformeTempsEnTexte($highScore->ElapsedTime).'</span>';
            echo "</li>";
        }
        echo '</ol>';
        echo '</div>';
    }
    
    /**
     * printDifficulty
     *
     * @param int selectedDifficulty Difficulté sélectionné
     * @return void
     */
    public static function printDifficulty($selectedDifficulty){
        $allDifficulties = EnumDifficulty::getAllDifficultyTexte();
        echo '<form method="POST" id="form_difficulty" action="index.php">';
        echo '<select id="select_difficulty" name="difficulty">';
        foreach ($allDifficulties as $key => $texte) {
            echo '<option value="'.$key.'"';
            if ($selectedDifficulty == $key){echo ' selected ';}
            echo '>';
            echo $texte;
            echo '</option>';
        }
        echo '</select>';
        echo '</form>';
    }
    
    /**
     * printWinnerPopup
     *
     * @return void
     */
    public static function printWinnerPopup()
    {
        echo '<div id="winner-popup">';
        echo '<div id="winner-popup--title">Bravo !</div>';
        echo '<p>Vous avez gagnez en <span id="winner-popup--time">Xm XXs</span></p>';
        echo '<div id="winner-popup--form">';
        echo '<input type="text" name="playerName" id="winner-popup--playerName" placeholder="Votre nick en 3 lettres" maxlength="3">';
        echo '<input type="submit" value="Enregistrer" id="winner-popup--btnValider">';
        echo '</div>';
        echo '</div>';
    }
}