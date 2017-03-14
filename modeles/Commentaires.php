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
            throw new \Exception("$idPost n'est pas un index valide");
        }
    }

    public static function add($author, $content, $idPost){
        $commentaire = Connection::query(
            'INSERT INTO comments (creation_date, author, content, post_id)
            VALUES (:creation_date, :author, :content, :post_id)',
            [
                ':creation_date' => date('Y-m-d G:i:s'),
                ':author' => $author,
                ':content' => $content,
                ':post_id' => $idPost
            ]
        );
    }

}
?>
