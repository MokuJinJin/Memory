<?php namespace oclock\game;

/**
 * Card
 */
class Card {	
	
		
	/**
	 * card Name
	 *
	 * @var string
	 */
	public $cardName;

	/**
	 * __construct
	 *
	 * @param  string $EnumCard
	 * @return void
	 */
	public function __construct($cardName){
		$this->cardName = $cardName;
		//echo 'Card created : '.$EnumCard;
	}

	public function __toString()
	{
		return "Card ".$this->cardName;
	}
}