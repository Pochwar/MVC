<?php
//definition du repertoire de base du projet
define('BASE_DIR', __DIR__."/");

//définition des namespaces utilisés
use Blog\Controlleurs;
use Whitebear\Classes;

//Chargement et execution de la class d'autoload des classes
require_once 'whitebear/classes/Loader.php';
Classes\Loader::autoload();

//Chargement du routeur
Controlleurs\Routeur::routerRequete();
