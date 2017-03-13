<?php
class ModeleCommentaires
{
    public static function getByPostId($idPost){
        if(is_int($idPost)){
            $commentaire = ModeleConnection::query('SELECT id as id, creation_date as date, content as contenu, author as auteur
            from comments
            where post_id=:id',
            [':id'=>$idPost]
        );
            return $commentaire;
        } else {
            throw new Exception("$idPost n'est pas un index valide");
        }
    }
}
 ?>
