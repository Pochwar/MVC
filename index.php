<?php
//definition du repertoire de base du projet
define('BASE_DIR', __DIR__."/");

use Blog\Controlleurs;
use Blog\Classes;

require_once 'classes/Loader.php';
Classes\Loader::autoload();


$routeur = new Controlleurs\Routeur;
$routeur->routerRequete();
