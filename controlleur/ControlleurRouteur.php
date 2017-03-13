<?php
class ControlleurRouteur
{
    private $ctrlAccueil;
    private $ctrlPost;
    private $ctrlError;

    public function __construct()
    {
        $this->ctrlAccueil = new ControlleurAccueil;
        $this->ctrlPost = new ControlleurPost;
        $this->ctrlError = new ControlleurError;
    }

    public function routerRequete(){
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'post') {
                    if (isset($_GET['id'])) {
                        $idPost = intval($_GET['id']);
                        if ($idPost != 0){
                            $this->ctrlPost->post($idPost);
                        }
                        else
                        throw new ClassNotFoundException("Identifiant de billet non valide");
                    }
                    else
                    throw new ClassNotFoundException("Identifiant de billet non défini");
                }
                else
                throw new ClassNotFoundException("Action non valide");
            }
            else {
                $this->ctrlAccueil->accueil();  // action par défaut
            }
        }
        catch (ClassNotFoundException $e) {
            $this->ctrlError->error($e->getMessage());
        }
        catch (Exception $e) {
            file_put_contents('errors.txt', "@ ".date('Y/m/d G:i:s')." ERROR : ".$e->getMessage()."\n", FILE_APPEND);
            $this->ctrlError->error(ClassConfig::errorMsg);
        }
    }
}

 ?>
