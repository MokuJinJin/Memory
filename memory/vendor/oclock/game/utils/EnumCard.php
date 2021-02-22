<?php namespace oclock\game\utils;

/**
 * Liste des cartes possibles
 */
class EnumCard {

    const numberOfCardAvailable = 18;

    const cards = array(
        "Apple",
        "Banana",
        "Apricot",
        "GreenLime",
        "Grenade",
        "Peach",
        "Lime",
        "Fraise",
        "PommeVerte",
        "PeachOrange",
        "Raisin",
        "Pasteque",
        "Prune",
        "Poire",
        "Cerise",
        "Framboise",
        "Mangue",
        "CeriseJaune"
    );

        
    /**
     * getRandomCard
     *
     * @param  string[] $excludeArray
     * @return void
     */
    public static function getRandomCard($excludeArray){
        $selectedCard = EnumCard::cards[array_rand(EnumCard::cards, 1)];
        while (in_array($selectedCard, $excludeArray)) {
            $selectedCard = EnumCard::cards[array_rand(EnumCard::cards, 1)];
        }
        return $selectedCard;
    }
}