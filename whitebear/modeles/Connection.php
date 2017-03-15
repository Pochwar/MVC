<?php
namespace Whitebear\Modeles;
use Whitebear\Config;
class Connection
{
    private static $instance;
    private static $pdo;

    private function __construct()
    {
        $type = Config\Configuration::get('DB', 'type');
        $charset = Config\Configuration::get('DB', 'charset');
        $host = Config\Configuration::get('DB', 'host');
        $user = Config\Configuration::get('DB', 'user');
        $pass = Config\Configuration::get('DB', 'pass');
        $dbname = Config\Configuration::get('DB', 'dbname');
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
