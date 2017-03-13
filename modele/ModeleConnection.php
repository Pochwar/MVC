<?php
class ModeleConnection
{
    private static $instance;
    private static $pdo;

    private function __construct()
    {
        $type = ClassConfig::DB['type'];
        $charset = ClassConfig::DB['charset'];
        $host = ClassConfig::DB['host'];
        $user = ClassConfig::DB['user'];
        $pass = ClassConfig::DB['pass'];
        $dbname = ClassConfig::DB['dbname'];
        self::$pdo = new PDO("$type:host=$host;dbname=$dbname;charset=$charset", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new ModeleConnection();
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
