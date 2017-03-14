<?php
//definition du repertoire de base du projet
define('BASE_DIR', __DIR__."/");

use Blog\Controlleurs;
use Blog\Classes;
use Blog\Config;

require_once 'classes/Loader.php';
Classes\Loader::autoload();

Controlleurs\Routeur::routerRequete();
