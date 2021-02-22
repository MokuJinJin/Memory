<?php namespace oclock\game;
use \oclock\game\utils\EnumDifficulty;
use \oclock\game\utils\EnumCard;
/**
 * Memory
 */
class Memory {
		
	/**
	 * List of cards in the game
	 *
	 * @var Card[]
	 */
	public $cards;
		
	/**
	 * constructor
	 *
	 * @param  int $difficulty
	 * @return void
	 */
	public function __construct($difficulty = EnumDifficulty::Easy){
		
		//echo 'Game Created';
		$numberOfPair = $difficulty / 2;

		$excludedCards = array();
		
		for ($i=0; $i < $numberOfPair; $i++) { 
			// on demande une carte aléatoire qui n'a pas été tiré
			$newCard = new Card(EnumCard::getRandomCard($excludedCards));
			// On ajoute une paire
			$this->cards[] = $newCard;
			$this->cards[] = $newCard;
			// on exclue son nom pour les prochain tirages
			$excludedCards[] = $newCard->cardName;
		}
		// on mélange
		shuffle($this->cards);
	}
}