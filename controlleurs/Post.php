<?php
namespace Blog\Controlleurs;
use Blog\Vues;
use Blog\Modeles;
class Post
{
    public function post($id){
        $post = Modeles\Posts::getById($id);
        $commentaire = Modeles\Commentaires::getByPostId($id);
        $vue = new Vues\Vue("post");
        $vue->generer(['post' => $post, 'commentaire' => $commentaire]);
    }
}

?>
