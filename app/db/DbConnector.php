<?php
namespace App\db;
use \PDO as PDO;
class DbConnector
{

    private $host;
    private $user;
    private $password;
    private $db;
    protected static $instance;
    protected $pdo;

    /**
     * DbConnector constructor.
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     */
    public static function init($host, $user, $password, $db)
    {
        if(self::$instance)
        {
            return self::$instance;
        }
        try
        {
         $instance = new DbConnector();
         $instance->pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8mb4", $user, $password);
         $instance->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $instance->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         self::$instance = $instance;
        }catch (\PDOException $e){
            $e->getMessage();
        }
        return self::$instance;
    }


    public static function select(String $query, Array $args = [])
    {
        $db = self::$instance;
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }


    public static function insert(String $query, Array $args = [])
    {
        $db = self::$instance;
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($args);
    }

    public static function update(String $query, Array $args = [])
    {
        $db = self::$instance;
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($args);
    }
}