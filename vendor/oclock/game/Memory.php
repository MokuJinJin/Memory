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
	 * Nombre de paires de cartes
	 *
	 * @var int
	 */
	public $numberOfPair;
	
	/**
	 * Temps pour résoudre le jeu avant de perdre
	 * Exprimé en secondes
	 *
	 * @var int
	 */
	public $timeToResolve;
	
	/**
	 * constructor
	 *
	 * @param  int $difficulty
	 * @return void
	 */
	public function __construct($difficulty = EnumDifficulty::Easy){
		
		$this->numberOfPair = $difficulty / 2;
		
		$this->timeToResolve = EnumDifficulty::timeToResolve($difficulty);

		$excludedCards = array();
		
		for ($i=0; $i < $this->numberOfPair; $i++) { 
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