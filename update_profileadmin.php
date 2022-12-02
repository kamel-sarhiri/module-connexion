<?php

@include 'config.php';

session_start();



$select = "SELECT * FROM utilisateurs2 WHERE login = '".$_SESSION['admin_name']."'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);
}


if(isset($_POST['submit'])) {
    //Récupération des valeurs des champs:
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    //$pass = md5($_POST['password']);

    

    //Requête de modification d'enregistrement
    $sql = "UPDATE utilisateurs2 SET nom = '$name', prenom = '$lastname', login = '$login' WHERE login = '$login'";

    //Exécution de la requête
    $resultat = mysqli_query($conn, $sql);

    //Contôle sur la requête
    if($resultat) {
    echo "<h1>Requête validée !<h1><p>la mise à jour a été éffectuée !<p>";
    } else {
    die('Erreur SQL !'.$sql.'<br />'.mysqli_error($conn));
    }

} //Fin du test isset


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Modification profil</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Modification de profil</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class = "error-msg">'.$error.'</span>';
                }
            }
            ?>
            <span>Ancien nom : </span><?php echo "$row[nom]"?>
            <input type="text" name="name" value="" placeholder="Entrer votre nouveau nom">
            <span>Ancien prénom : </span><?php echo "$row[prenom]"?>
            <input type="text" name="lastname" value="" placeholder="Entrez votre nouveau prénom">
            <span>Ancien login : </span><?php echo "$row[login]"?>
            <input type="text" name="login" value="" placeholder="Entrer votre nouveau login">
            <input type="submit" name="submit" value="Modifier" class="form-btn">
        </form>
        
    </div>
    <div class="container">
    <!-- zone de connexion -->
              <div class=content>
                <a href="admin_page.php" class="btn">Retour</a>
            </div>
            <div class=content>
                <a href="logout.php" class="btn">Déconnexion</a>
            </div>
        </div>
</body>
</html>