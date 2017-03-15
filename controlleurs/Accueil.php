<?php
namespace Blog\Controlleurs;
use Whitebear\Vues;
use Blog\Modeles;
class Accueil
{
    public static function accueil()
    {
        $posts = Modeles\Posts::getAll();
        $vue = new Vues\Vue("Accueil");
        $vue->generer(['posts' => $posts]);
    }
}

?>
