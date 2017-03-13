<?php
namespace Blog\Vues;
use Blog\Classes;
class Vue
{
    private $titre;
    private $fichier;

    public function __construct($action){
        $this->fichier = BASE_DIR .'vues/vue'.$action.'.php';
    }

    public function generer($donnees){
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('vues/vueGabarit.php',[
            'titre' => $this->titre,
            'contenu' => $contenu
        ]);
        echo $vue;
    }

    private function genererFichier($fichier, $donnees){
        if(file_exists($fichier)){
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } else {
            throw new Classes\NotFoundException("Fichier '$fichier' introuvable");

        }
    }

}
 ?>
