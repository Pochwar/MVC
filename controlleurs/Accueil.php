<?php
namespace Blog\Controlleurs;
use Blog\Vues;
use Blog\Modeles;
class Accueil
{
    public function accueil()
    {
        $posts = Modeles\Posts::getAll();
        $vue = new Vues\Vue("Accueil");
        $vue->generer(['posts' => $posts]);
    }
}

?>
