<?php namespace oclock\game;

class Board {
    
    /**
     * Nombre de ligne voulu sur le plateau de jeu
     */
    const numberRows = 4;

    /**
     * printBoard
     *
     * @param  Memory $game
     * @return void
     */
    public static function printBoard($game)
    {
        /* Calcul du nombre de ligne et colonne en fonction du nombre de cartes */
        $numberOfCards = count($game->cards);
        $rows = $numberOfCards / Board::numberRows;
        $cols = $numberOfCards / $rows;
        
        echo '<table><tr>';
        foreach ($game->cards as $id => $card) {
            Board::printCard($id, $card->cardName);
            if (($id+1) % $rows == 0) {
                echo '</tr><tr>';
            }
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
        <td class="card" id="'.$id.'">
                <div class="card--front"></div>    
                <div class="card--back card--'.$cardName.'"></div>
        </td>
        ';
    }
}