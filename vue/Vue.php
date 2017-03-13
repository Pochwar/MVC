<?php
class Vue
{
    private $titre;
    private $fichier;

    public function __construct($action){
        $this->fichier = BASE_DIR .'vue/vue'.$action.'.php';
    }

    public function generer($donnees){
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('vue/vueGabarit.php',[
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
            throw new ClassNotFoundException("Fichier '$fichier' introuvable");

        }
    }

}
 ?>
