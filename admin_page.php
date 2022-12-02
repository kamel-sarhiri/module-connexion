<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('Location: login_form.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Page Admin</title>
 </head>
 <body>
    <div class="container">
    <!-- zone de connexion -->
        <div class=content>
            <h3>Bonjour, <span>admin</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['admin_name']?></span></h1>
            <p>Vous êtes sur la page admin</p>
            <a href="update_profileadmin.php" class="btn">Modification de compte</a>
            <a href="logout.php" class="btn">Déconnexion</a>
        </div>
    </div>
 </body>
</html>
