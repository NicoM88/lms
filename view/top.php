<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/view/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <title>LMS by Grand EST</title>
</head>
<body>

<?php
// navbar bootstrap
//dedans si connecté faire bouton déconnexion
//       sinon si déconnecté bouton connexion
?>

<!-- création de la navbar-->
<nav class="navbar navbar-light bg-light">
    <div style="color: blue"> Accueil </div>
    <div style="text-align: center; color: blue"> Présentation</div>
    <!--afficher le message de bienvenue-->
    <div>
        <div class="nav-brand" style="background-color: #2ed7cf; float: left;">
            Bienvenue <?=$USER -> firstname?> <?=$USER -> lastname?>
        </div>
        <a class="navbar-brand" href="#">
        <!--création du bouton déconnection-->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Déconnection</button>
        </a>
    </div>

</nav>

