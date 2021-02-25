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
    
    
    /**
     * getAllDifficultyTexte
     *
     * @return string[]
     */
    public static function getAllDifficultyTexte(){
        $difficulties["Debug"] = "Debug (".(EnumDifficulty::Debug / 2)." cartes en ".EnumDifficulty::timeToResolve(EnumDifficulty::Debug)." secondes)";
        $difficulties["Easy"] = "Easy (".(EnumDifficulty::Easy / 2)." cartes en ".EnumDifficulty::timeToResolve(EnumDifficulty::Easy)." secondes)";
        $difficulties["Normal"] = "Normal (".(EnumDifficulty::Normal / 2)." cartes en ".EnumDifficulty::timeToResolve(EnumDifficulty::Normal)." secondes)";
        $difficulties["Hard"] = "Hard (".(EnumDifficulty::Hard / 2)." cartes en ".EnumDifficulty::timeToResolve(EnumDifficulty::Hard)." secondes)";
        $difficulties["VeryHard"] = "VeryHard (".(EnumDifficulty::VeryHard / 2)." cartes en ".EnumDifficulty::timeToResolve(EnumDifficulty::VeryHard)." secondes)";
        
        return $difficulties;
    }
    
    /**
     * getDifficultyFromText
     *
     * @param  string $texte
     * @return int
     */
    public static function getDifficultyFromText($texte){
        switch ($texte) {
            case "Debug":
                return EnumDifficulty::Debug;
                break;
            case "Easy":
                return EnumDifficulty::Easy;
                break;
            case "Normal":
                return EnumDifficulty::Normal;
                break;
            case "Hard":
                return EnumDifficulty::Hard;
                break;
            case "VeryHard":
                return EnumDifficulty::VeryHard;
                break;
            default:
                return 9999;
                break;
        }
    }
}