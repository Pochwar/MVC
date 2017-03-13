<?php
namespace Blog\Modeles;
use Blog\Classes;
class Commentaires
{
    public static function getByPostId($idPost){
        if(is_int($idPost)){
            $commentaire = Connection::query('SELECT id as id, creation_date as date, content as contenu, author as auteur
            from comments
            where post_id=:id',
            [':id'=>$idPost]
        );
            return $commentaire;
        } else {
            throw new Classes\Exception("$idPost n'est pas un index valide");
        }
    }
}
 ?>
