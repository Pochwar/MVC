<?php
class ControlleurAccueil
{
    public function accueil()
    {
        $posts = ModelePosts::getAll();
        $vue = new Vue("Accueil");
        $vue->generer(['posts' => $posts]);
    }
}

?>
