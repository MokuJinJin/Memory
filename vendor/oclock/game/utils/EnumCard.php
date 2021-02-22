<?php namespace oclock\game\utils;

/**
 * Liste des cartes
 */
class EnumCard {

    /**
     * Liste des cartes disponibles
     */
    const cards = array(
        "apple",
        "banana",
        "apricot",
        "greenlime",
        "grenade",
        "peach",
        "lime",
        "fraise",
        "pommeverte",
        "peachorange",
        "raisin",
        "pasteque",
        "prune",
        "poire",
        "cerise",
        "framboise",
        "mangue",
        "cerisejaune"
    );

        
    /**
     * Renvoi une carte tiré au hasard.
     * Si $excludeArray est fournit, renvoit une carte dont le nom n'est pas dans le tableau
     *
     * @param  string[] $excludeArray permet d'exclure des résultats
     * @return string
     */
    public static function getRandomCard($excludeArray = array()){
        $selectedCard = EnumCard::cards[array_rand(EnumCard::cards, 1)];
        while (in_array($selectedCard, $excludeArray)) {
            $selectedCard = EnumCard::cards[array_rand(EnumCard::cards, 1)];
        }
        return $selectedCard;
    }
}