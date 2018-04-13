<?php

$requested_url = $_SERVER['PATH_INFO'];
//echo "vous avez demandé l'url : ${requested_url}";
if (!$requested_url){
    $requested_url = '/';
}
//var_dump($_SERVER);

#initialisation
require 'tools/Logger.php';
require 'config/routes.php';

$logger = new Logger();

// est ce que la route existe ?
if (array_key_exists($requested_url, $routes_config)) {

    $logger->log("route found : ${requested_url}");
    // si oui je l'inclus
    $controller = $routes_config[$requested_url];

    //est ce que le fichier controller existe ?
    if (file_exists($controller)) {
        $logger->log("controller found :${requested_url}");

        //inclusion du top du  site
        require 'view/top.php';
        //inclusion du controller
        require $controller;
        //inclusion du bot du site
        require 'view/bot.php';

    } else {
        $logger->log("controller not found :${requested_url}");
        require 'controller/error/404.php';
    }
} else {
    $logger -> log("route not found :${requested_url}");
    require 'controller/error/404.php';
}




// si je demande /auth/login
//if ($resqueted_url === '/auth/login'){
//    // je veux inclure controller/auth/login.php
//    require 'controller/auth/login.php';
//}