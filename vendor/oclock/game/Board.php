<?php namespace oclock\game;


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
    public static function printBoard($game)
    {
        /* Calcul du nombre de ligne et colonne en fonction du nombre de cartes */
        $numberOfCards = count($game->cards);
        $rows = $numberOfCards / Board::numberRows;
        $cols = $numberOfCards / $rows;
        
        echo '<table id="Game" data-pair="'.$game->numberOfPair.'" data-seconds="'.$game->timeToResolve.'"><tr>';
        foreach ($game->cards as $id => $card) {
            
            Board::printCard($id, $card->cardName);
            
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
    public static function printCard($id, $cardName){
        echo '
        <td class="card" id="'.$id.'" data-fruit="'.$cardName.'" title="'.$cardName.'">
                <div class="backCard"></div>    
                <div class="visualCard card--'.$cardName.'" ></div>
        </td>
        ';
    }
}