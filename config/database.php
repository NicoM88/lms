<?php
/**
 * Created by PhpStorm.
 * User: cci
 * Date: 24/04/18
 * Time: 10:51
 */

// 1) PDO connexion à la base de données lms

try{

$bdd = new PDO('mysql:host=localhost;dbname=lms;charset=utf8', 'root', 'simplonformation');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "connecté";

}

catch (PDOException $ex)
{
    die('Erreur : ' . $ex->getMessage());
}

?>