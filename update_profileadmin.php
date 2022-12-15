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
    $pass = md5($_POST['cpassword']);

    

    //Requête de modification d'enregistrement
   $sql = "UPDATE utilisateurs2 SET nom = '$name', prenom = '$lastname', login = '$login', password = '$pass' WHERE login = '$login'";

    //Exécution de la requête
    $resultat = mysqli_query($conn, $sql);

    //Contôle sur la requête
    if($resultat) {
    echo "<br><br><br><br><br><br><h1>Requête validée !<h1><p>la mise à jour a été éffectuée !<p>";
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
    <header>
        <div class="container">
            <div id="left">
                <h3>Kamel SARHIRI</h3>
                <h4>Web Developper</h4>
            </div>
            
            <div id="right">
                <?php
                    // test si l'utilisateur est connecté
                
                    if (isset($_GET['deconnexion'])){
                        if($_GET['deconnexion']==true){
                            session_unset();
                            header('Location: Index.php');
                        }
                    }
                    else if(isset($_SESSION['admin_name'])){
                        $user = $_SESSION['admin_name'];

                        echo "<div id='center'>
                                <h3>Bonjour $user</h3>
                            </div>";
                        
                        if ($user != 'admin') {
                            $_SESSION['admin'] = "false";
                            echo "<nav>
                                <ul>
                                    <li><a class='a_head'href='index.html'>Accueil</a></li>
                                    <li><a class='a_head'href='update_profile.php'>Modification profil</a></li>
                                    <li><a class='a_head' href='logout.php'>Déconnexion</a></li>
                                </ul>
                            </nav>";
                        }
                        else {
                            $_SESSION['admin'] = "true";
                            echo "<nav>
                                <ul>
                                    <li><a class='a_head'href='index.html'>Accueil</a></li>
                                    <li><a class='a_head'href='update_profileadmin.php'>Modification profil</a></li>
                                    <li><a class='a_head' href='logout.php'>Déconnexion</a></li>
                                </ul>
                            </nav>";
                        }
                    }
                ?>
            </div>
            
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

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
             <span>Ancien mot de passe : </span><?php echo "$row[password]"?>
            <input type="password" name="cpassword" value="" placeholder="Entrer votre nouveau mot de passe">
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

        <footer class="footer_2" style="padding-top: 10px; padding-bottom: 10px">
        <div>
            <p>
                © Module connexion. Tous droits réservés. | Mentions légales | Cookies |
                Référent  : SARHIRI Kamel
            </p>
        </div>

        <div>
            <ul class="reseaux">
                <li>
                    <a
                        href="https://www.facebook.com/ksarhi"
                        title="Suivez sur Facebook"
                        target="_blank"
                    >
                        <img
                        loading="lazy"
                        src="footer-picto-facebook.jpg"
                        alt="Suivez sur Facebook"
                        title="Suivez sur Facebook"
                        height="auto"
                        width="auto"
                        />
                    </a>
                </li>
                <li>
                    <a
                        href="https://www.instagram.com/kamelsarhi/"
                        title="Suivez sur Instagram"
                        target="_blank"
                    >
                        <img
                        src="footer-picto-instagram.jpg"
                        alt="Suivez sur Instagram"
                        title="Suivez sur Instagram"
                        height="auto"
                        width="auto"
                        />
                    </a>
                </li>
                <li>
                    <a
                        href="https://twitter.com/fcbarcelona_fra"
                        title="Suivez sur Twitter"
                        target="_blank"
                    >
                        <img
                        loading="lazy"
                        src="footer-picto-twitter.jpg"
                        alt="Suivez sur Twitter"
                        title="Suivez sur Twitter"
                        height="auto"
                        width="auto"
                        />
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>