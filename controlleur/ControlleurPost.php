<?php
class ControlleurPost
{
    public function post($id){
        $post = ModelePosts::getById($id);
        $commentaire = ModeleCommentaires::getByPostId($id);
        $vue = new Vue("post");
        $vue->generer(['post' => $post, 'commentaire' => $commentaire]);
    }
}

?>
