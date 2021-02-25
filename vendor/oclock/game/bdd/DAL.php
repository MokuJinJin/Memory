<?php namespace oclock\game\bdd;

use \oclock\game\bdd\Base_DAL;
use \oclock\game\bdd\EnumBddClass;

/**
 * DAL
 */
class DAL extends Base_DAL {

	 /**
     * @param $difficulty EnumDifficulty difficulté du jeu
     * @return HighScore[]
     */
    public static function GetAllHighScoreForDifficulty($difficulty)
    {
		$req = "select id,PlayerName,Difficulty,ElapsedTime,Date from `high_score` where Difficulty = ".$difficulty.";";
        $allHighScore = self::GetAllSomething($req,EnumBddClass::HighScore);

        return $allHighScore;
    }

	/**
     * @param $difficulty EnumDifficulty difficulté du jeu
	 * @param $nombre int nombre de résultat
     * @return HighScore[]
     */
    public static function GetBestHighScoreForDifficulty($difficulty, $nombre)
    {
        $req = "select id,PlayerName,Difficulty,ElapsedTime,Date from `high_score` where Difficulty = ".$difficulty." order by ElapsedTime asc limit ".$nombre.";";
        $allHighScore = self::GetAllSomething($req,EnumBddClass::HighScore);

        return $allHighScore;
    }

	/**
	 * @param HighScore $highScore Toutes les informations d'un high score
	 */
	public static function AddHighScore($highScore)
	{
			$req = "insert into `high_score` (PlayerName,Difficulty,ElapsedTime,Date) VALUES ('".$highScore->PlayerName."',".$highScore->Difficulty.",'".$highScore->ElapsedTime."', '".date_format($highScore->Date,'Y-m-d H:i:s')."')";
			self::AddSomething($req);
	}

}
