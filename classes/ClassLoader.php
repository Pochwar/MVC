<?php
class ClassLoader
{
    public static function loadClasses($classe){
        $dependencies = [
            "/Modele/" => "modele",
            "/Class/" => "classes",
            "/Vue/" => "vue",
            "/Controlleur/" => "controlleur"
        ];
        foreach ($dependencies as $pattern => $dir) {
            if(preg_match("$pattern", $classe)){
                require_once BASE_DIR . "$dir/$classe.php";
            }
        }
    }
}

 ?>
