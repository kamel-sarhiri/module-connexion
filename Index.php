<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <title></title>
 </head>
 <body style='background:#fff;'>
    <div id="content">
    <!-- tester si l'utilisateur est connecté -->
        <?php
        session_start();
        if(isset($_GET['deconnexion']))
        { 
        if($_GET['deconnexion']==true)
        { 
        session_unset();
        header("location:login.php");
        }
        }
        else if($_SESSION['username'] !== ""){
        $user = $_SESSION['username'];
        // afficher un message
        echo "<br>Bonjour $user, vous êtes connectés";
        }
        ?>
        <br>
        <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
    </div>
 </body>
</html>