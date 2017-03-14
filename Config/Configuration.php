<?php
namespace Blog\Config;
class Configuration
{
    private static $param;

    public static function get($section, $nom, $defaultValue = null)
    {
        $parameter = self::getParam();
        //on vérifie l'existence du parametre recherché dans le fichier ini
        if(is_array($parameter) && isset($parameter[$section]) && isset($parameter[$section][$nom])){
            return $parameter[$section][$nom];
        }
        //si le parametre n'est pas défini, on regarde si une valeur par défaut est indiquée
        if($defaultValue == null) {
            throw new \Exception("Parametre de configuration non trouvé et non défini par défaut");
        }
        return $defaultValue;
    }

    private static function getParam(){
        //si le tableau de parametre existe, on le renvoie
        if (self::$param != null) return self::$param;

        //sinon on va chercher dans le fichiers prod.ini
        $file = BASE_DIR ."Config/prod.ini";
        //si prod.ini n'existe pas, on va chercher dev.ini
        if(!file_exists($file)){
            $file = BASE_DIR ."Config/dev.ini";
        }
        //si dev.ini n'existe pas, on erenvoie une erreur
        if(!file_exists($file)){
            throw new \Exception("Aucun fichier de configuration trouvé");
        }
        //sinon on parse le fichier ini pour en faire un tableau de parametres que l'on renvoie
        self::$param = parse_ini_file($file, true);
        return self::$param;

    }
}
?>
