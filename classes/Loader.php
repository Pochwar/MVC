<?php
namespace Blog\Classes;
class Loader
{
   public static function autoload()
   {
       spl_autoload_register(function ($classe) {
           // Premier caractère du namespace à retirer
           $classe = str_replace('Blog\\', '', $classe);
           // Changer les \ par des /
           $classe = str_replace('\\', '/', $classe);
           // Récupère la première partie du chemin pour la mettre en minuscule
           $classe = preg_replace_callback('#^(.+/)([^/]+)$#', function($match){
               return strtolower($match[1]) . $match[2];
           }, $classe);

           include BASE_DIR . "$classe.php";

       });
   }
}
