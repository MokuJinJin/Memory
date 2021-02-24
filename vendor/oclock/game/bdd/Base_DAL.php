<?php namespace oclock\game\bdd;

/**
 * Class Base_DAL
 */
class Base_DAL {
    /**
     * DatabaseName
     */
	 
	protected static $DatabaseName;
	protected static $ENV;
	/** @var \PDO Active */
	protected static $pdo;

	protected static $host;
	protected static $login;
	protected static $mpd;

    /**
     * Constructor
     */
    protected function __construct(){
	}

    /**
     * Renvoit la connexion à la base
     * @return \PDO
     */
    protected static function Connect()
    {
        self::$ENV='dev';

        if (self::$pdo == null)
        {
            ini_set('display_errors',1);
            error_reporting (E_ALL & ~E_NOTICE);
            self::$DatabaseName = 'memory';
            self::$host = 'localhost';
            self::$login = 'root';
            self::$mpd = '';

            try {
                self::$pdo = new \PDO('mysql:host='.self::$host.';dbname='.self::$DatabaseName.';charset=UTF8', self::$login, self::$mpd);
            } catch (\PDOException $e) {
                die ('Connexion échouée : ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }

    /**
     * @param $req string requête à exécuter
     * @return array
     */
    public static function QueryArray($req)
    {
        $pdo = self::Connect();
        $ress = $pdo->query($req);
        return $ress->fetchAll();
    }

    /**
     * @param $req string requête à exécuter
     * @return int nombre de ligne affecté
     */
    public static function UpdateSomething($req)
    {
        $pdo = self::Connect();
        return $pdo->exec($req);
    }

    /**
     * @param $req string requête à exécuter
     * @param string $what Nom de la classe à renvoyer
     * @return array
     */
    protected static function GetAllSomething($req, $what)
    {
        $pdo = self::Connect();
        $ress = $pdo->query($req);
		if($ENV=='dev' && $pdo->errorCode()) print_r($pdo->errorInfo());
		if($ENV=='dev' && $ress->errorCode()) print_r($ress->errorInfo());
        $all = array();
        while($row = $ress->fetchObject($what))
        {
            $all[] = $row;
        }
        return $all;
    }

    /**
     * @param $req string requête à exécuter
     * @param string $what Nom de la classe à renvoyer
     * @return mixed
     */
    protected  static function GetSomething($req, $what)
    {
        $pdo = self::Connect();
        $ress = $pdo->query($req);
        $one = $ress->fetchObject($what);

        return $one;
    }

    /**
     * @param $req string requête (Insert Into) à exécuter
     * @return int last insert id
     */
    protected static function AddSomething($req)
    {
        $pdo = self::Connect();
        $ok = $pdo->exec($req);
        // TODO gérer le cas où la requete plante
        return $pdo->lastInsertId();
    }
}
