<?php
namespace Blog\Modeles;
use Whitebear\Classes;
use Whitebear\Modeles;
class Posts
{
    public static function getAll(){
        $posts = Modeles\Connection::query(
            'SELECT p.id AS id, count(c.post_id) AS nbcom, p.creation_date AS date, title AS titre, p.content AS contenu
            FROM posts p LEFT JOIN comments c
            ON  p.id = c.post_id
            GROUP BY c.post_id
            ORDER BY date DESC'
        );
        return $posts;
    }

    public static function getById($idPost){
        $post = Modeles\Connection::query(
            'SELECT id as id, creation_date as date, title as titre, content as contenu
            from posts where id=?',
            [$idPost]
        );
        if ($post->rowCount() == 1){
            return $post->fetch();
        } else {
            throw new Classes\NotFoundException("Aucun post ne correspond à l'identifiant $idPost");
        }
    }
}
 ?>
