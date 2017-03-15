<?php
namespace Blog\Vues;
use Blog\Classes;
use Blog\Config;
class Vue
{
    private $titre;
    private $fichier;
    private $gabarit;

    public function __construct($action, $gabarit = "gabarit"){
        $this->fichier = BASE_DIR .'vues/vue'.$action.'.php';
        $this->gabarit = BASE_DIR .'vues/'.$gabarit.'.php';
    }

    public function generer($donnees){
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier($this->gabarit,[
            'titre' => $this->titre,
            'base_url' => Config\Configuration::get('url', 'base'),
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
