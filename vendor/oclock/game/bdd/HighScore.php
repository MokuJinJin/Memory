<?php namespace oclock\game\bdd;

/**
 * HighScore Informations sur une partie gagnée
 */
class HighScore {
    
    /**
     * Constructeur vide pour PDO
     */
    public function __construct(){}

    /**
     * Constructeur pour initialiser toutes les propriétés
     *
     * @param  mixed $playerName Nom du joueur
     * @param  mixed $difficulty Niveau de difficulté
     * @param  mixed $time Temps en millisecondes
     * @param  mixed $date Date/Time de la partie
     * @return void
     */
    public static function fullConstruct($playerName, $difficulty, $time, $date){
        $instance = new HighScore();
        $instance->PlayerName = $playerName;
        $instance->Difficulty = $difficulty;
        $instance->ElapsedTime = $time;
        $instance->Date = $date;
        return $instance;
    }
    
    /**
     * int Identifiant de la base de donnée
     */
    public $id;
    /**
     * string Nom du joueur
     */
    public $PlayerName;
    /**
     * EnumDifficulty Niveau de difficulté
     */
    public $Difficulty;
    /**
     * int Temps en millisecondes pour terminer le jeu
     */
    public $ElapsedTime;
    /**
     * Date/Time de la partie
     */
    public $Date;
}