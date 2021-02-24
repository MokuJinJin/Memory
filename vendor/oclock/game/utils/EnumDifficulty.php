<?php namespace oclock\game\utils;

/**
 * Liste des difficultés du jeu
 * Définit le nombre de cartes
 */
class EnumDifficulty {

    /**
     * Debug : 4 cartes
     */
    const Debug = 4;
    
    /**
     * Easy : 16 cartes
     */
    const Easy = 16;

    /**
     * Normal : 20 cartes
     */
    const Normal = 20;

    /**
     * Hard : 28 cartes
     */
    const Hard = 28;

    /**
     * VeryHard : 36 cartes
     */
    const VeryHard = 36;
    
    /**
     * Calcul du temps pour résoudre le jeu avant de perdre
     *
     * @param  EnumDifficulty $difficulty
     * @return int
     */
    public static function timeToResolve($difficulty) {
        switch ($difficulty) {
            case EnumDifficulty::Debug:
                return 10;
                break;
            case EnumDifficulty::Easy:
                return 120;
                break;
            case EnumDifficulty::Normal:
                return 150;
                break;
            case EnumDifficulty::Hard:
                return 180;
                break;
            case EnumDifficulty::VeryHard:
                return 210;
                break;
            default:
                return 9999;
                break;
        }
    }
}