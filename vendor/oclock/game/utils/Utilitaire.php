<?php namespace oclock\game\utils;

/**
 * Utilitaire
 */
class Utilitaire {
    /**
     * Transforme des secondes en affichage minutes/secondes
     * @param int diff temps exprimé en millisecondes
     * @return string affichage minutes/secondes
     */
    public static function transformeTempsEnTexte($diff){
        return Utilitaire::calculDuResteEnMinute($diff)."m ".Utilitaire::calculDuResteEnSeconde($diff)."s ";
    }

    /**
     * Calcul sur le temps restant pour obtenir uniquement les minutes
     * @param int diff temps exprimé en millisecondes
     * @return int temps restant exprimé en minutes
     */
    private static function calculDuResteEnMinute($diff){
        return floor(($diff % (1000 * 60 * 60)) / (1000 * 60));
    }

    /**
     * Calcul sur le temps restant pour obtenir uniquement les secondes
     * @param int diff temps exprimé en millisecondes
     * @return int temps restant exprimé en secondes
     */
    private static function calculDuResteEnSeconde($diff){
        return floor(($diff % (1000 * 60)) / 1000);
    }
}