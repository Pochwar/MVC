<?php
namespace Blog\Controlleurs;
use Whitebear\Classes;
use Whitebear\Config;
class Routeur
{

    public static function routerRequete(){
        try {
            //on détermine 'path' comme variable contenant tout ce qui se trouve apres l'url de base
            $path = str_replace(Config\Configuration::get('url', 'base'), '', $_SERVER['REQUEST_URI']);
            //Action par defaut, on affiche tous les posts sur la page d'accueil
            if ($path == '') {
                Accueil::accueil();
            } else {
                $path_param = explode('/', $path);
                // var_dump($path_param);
                // affichage d'un post
                if ($path_param[0] == 'post') {
                    if (isset($path_param[1])) {
                        $idPost = intval($path_param[1]);
                        if ($idPost != 0){
                            Post::post($idPost);
                        }
                        else
                        throw new Classes\NotFoundException("Identifiant de billet non valide");
                    } else {
                        throw new Classes\NotFoundException("Identifiant de billet non défini");
                    }
                    // ajout d'un commentaire
                } elseif ($path_param[0] == 'comment') {
                    if (isset($_POST['postid'])) {
                        $postId = $_POST['postid'];
                        $content = $_POST['content'];
                        $author = $_POST['author'];
                        Post::comment($author, $content, $postId);
                    } else {
                        throw new Classes\NotFoundException("Identifiant de billet non défini");
                    }
                    //Si l'acion n'est pas reconnue
                } else {
                    throw new Classes\NotFoundException("Action non valide");
                }
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
