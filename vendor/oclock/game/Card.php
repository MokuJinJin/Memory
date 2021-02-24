<?php namespace oclock\game;

/**
 * Carte
 */
class Card {	
	
	/**
	 * Nom de la carte
	 *
	 * @var string
	 */
	public $cardName;

	/**
	 * __construct
	 *
	 * @param  string $cardName Nom de la carte
	 * @return void
	 */
	public function __construct($cardName){
		$this->cardName = $cardName;
	}
}