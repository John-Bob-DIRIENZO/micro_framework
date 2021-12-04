<?php

// Preflight (une requête OPTIONS envoyée automatiquement par le navigateur)
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: http://localhost:3000');
header("Access-Control-Allow-Headers: authorization, content-type");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

require __DIR__ . '/../vendor/autoload.php';

// Il faut set toutes les dépendances que l'on
// veut auto-injecter
$dic = new \App\Fram\Utils\DIC();
$dic->set('ConnectionInterface', function () {
    return new \App\Fram\Factories\PDOFactory();
});
$dic->autoInjects('Manager');

$router = new \App\Fram\Router();
$router->getController();