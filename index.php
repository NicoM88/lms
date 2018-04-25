<?php
//demarer la session

session_start();
//var_dump([$_SESSION]);

$requested_url = $_SERVER['PATH_INFO'];
//echo "vous avez demandé l'url : ${requested_url}";
if (!$requested_url){
    $requested_url = '/';
}
//var_dump($_SERVER);

#initialisation
require 'tools/Logger.php';
require 'config/routes.php';
include "config/database.php";

#inclusion des classes
require 'model/User.php';


# traitement de la session
// je recupere l'id de l'utilisateur présent dans la session
$user_id = $_SESSION['user_id'];

$USER = null;
if($_SESSION['user_id']){
    // requete SQL je récupère les informations dans la bdd qui correspondent à cet IDENTIFIANT
    $request = $bdd->prepare('SELECT id, email, firstname, lastname, last_login, update_at, created_at FROM user WHERE id=:id' );
    $request -> bindParam('id', $user_id);
    $request -> execute();
    //  je stock l'objet User correspondant dans la variable $USER
    $USER = $request -> fetchObject('User');
}

# initialisation des utilitaires
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




