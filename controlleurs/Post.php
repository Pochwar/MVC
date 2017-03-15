<?php
namespace Blog\Controlleurs;
use Whitebear\Vues;
use Blog\Modeles;
class Post
{
    public static function post($id){
        $post = Modeles\Posts::getById($id);
        $commentaire = Modeles\Commentaires::getByPostId($id);
        $vue = new Vues\Vue("post");
        $vue->generer(['post' => $post, 'commentaire' => $commentaire]);
    }

    public static function comment($author, $content, $idPost){
        $idPost = intval($idPost);
        $newCommentaire = Modeles\Commentaires::add($author, $content, $idPost);
        self::post($idPost);
    }
}

?>
