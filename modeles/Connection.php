<?php
namespace Blog\Modeles;
use Blog\Classes;
class Connection
{
    private static $instance;
    private static $pdo;

    private function __construct()
    {
        $type = Classes\Config::DB['type'];
        $charset = Classes\Config::DB['charset'];
        $host = Classes\Config::DB['host'];
        $user = Classes\Config::DB['user'];
        $pass = Classes\Config::DB['pass'];
        $dbname = Classes\Config::DB['dbname'];
        self::$pdo = new \PDO("$type:host=$host;dbname=$dbname;charset=$charset", $user, $pass, array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION));
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public static function query($query, Array $tabArg = []){
        self::getInstance();
        if (count($tabArg) != 0){
            $statement = self::$pdo->prepare($query);
            $statement->execute($tabArg);
        } else {
            $statement = self::$pdo->query($query);
        }
        return $statement;
    }


}
?>
