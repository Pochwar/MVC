<?php
//definition du repertoire de base du projet
define('BASE_DIR', __DIR__."/");

//autoload des classes et modeles
function loadClasses($classe){
    $dependencies = [
        "/Modele/" => "modele",
        "/Class/" => "classes",
        "/Vue/" => "vue",
        "/Controlleur/" => "controlleur"
    ];
    foreach ($dependencies as $pattern => $dir) {
        if(preg_match("$pattern", $classe)){
            require_once BASE_DIR . "$dir/$classe.php";
        }
    }
}
spl_autoload_register('loadClasses');

$routeur = new ControlleurRouteur;
$routeur->routerRequete();
