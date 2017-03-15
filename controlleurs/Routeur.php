<?php
namespace Blog\Controlleurs;
use Whitebear\Classes;
use Whitebear\Config;
class Routeur
{

    public static function routerRequete(){
        try {
            if (isset($_GET['action'])) {
                //recupération des posts
                if ($_GET['action'] == 'post') {
                    if (isset($_GET['id'])) {
                        $idPost = intval($_GET['id']);
                        if ($idPost != 0){
                            Post::post($idPost);
                        }
                        else
                        throw new Classes\NotFoundException("Identifiant de billet non valide");
                    } else {
                        throw new Classes\NotFoundException("Identifiant de billet non défini");
                    }
                    // ajoute d'un commentaire
                } elseif ($_GET['action'] == 'comment') {
                    if (isset($_POST['postid'])) {
                        $postId = $_POST['postid'];
                        $content = $_POST['content'];
                        $author = $_POST['author'];
                        Post::comment($author, $content, $postId);
                    } else {
                        throw new Classes\NotFoundException("Identifiant de billet non défini");
                    }
                } else {
                    throw new Classes\NotFoundException("Action non valide");
                }
            }
            else {
                Accueil::accueil();  // action par défaut
            }
        }
        catch (Classes\NotFoundException $e) {
            Error::error($e->getMessage());
        }
        catch (\Exception $e) {
            file_put_contents('errors.txt', "@ ".date('Y/m/d G:i:s')." ERROR : ".$e->getMessage()."\n", FILE_APPEND);
            Error::error(Config\Configuration::get('error', 'msg'));
        }
    }
}

?>
