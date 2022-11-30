<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('Location: login_form.php');
}

?>


<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Page Utilisateurs</title>
 </head>
 <body>
    <div class="container">
    <!-- zone de connexion -->
        <div class=content>
            <h3>Bonjour, <span>Utilisateur</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['user_name']?></span></h1>
            <p>Vous êtes sur la page utilisateur</p>
            <a href="login_form.php" class="btn">Connexion</a>
            <a href="register_form.php" class="btn">Création de compte</a>
            <a href="logout.php" class="btn">Déconnexion</a>
            




        </div>
    </div>
 </body>
</html>
