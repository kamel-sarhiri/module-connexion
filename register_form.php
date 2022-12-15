<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM utilisateurs2 WHERE login = '$login' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = "Login déja existant";

    }else{

        if($pass != $cpass){
            $error[] = "Les mots de passe ne correspondent pas";
        }else{
            $insert = "INSERT INTO utilisateurs2 (login, prenom, nom, password, usertype) VALUES ('$login', '$lastname', '$name', '$pass', '$user_type')";
            $result = mysqli_query($conn, $insert);
            header('Location: login_form.php');
            
        }

    }
    
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Formulaire d'inscription</title>
</head>
<body>
    <header>
        <div class="container">
            <div id="left">
                <h3>Kamel SARHIRI</h3>
                <h4>Web Developper</h4>
            </div>
            <div id="right">
                <nav>
                    <ul>
                        <li><a class='a_head'href='index.html'>Accueil</a></li>
                    </ul>
                </nav>
            </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <div class="form-container">
        <form action="" method="post">
            <h3>Inscrivez vous maintenant</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class = "error-msg">'.$error.'</span>';
                }
            }
            ?>
            <input type="text" name="name" required placeholder="Entrez votre nom">
            <input type="text" name="lastname" required placeholder="Entrez votre prénom">
            <input type="text" name="login" required placeholder="Choissisez votre login">
            <input type="password" name="password" required placeholder="Entrez votre mot de passe">
            <input type="password" name="cpassword" required placeholder="Confirmez votre mot de passe">
            <select name="user_type" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="inscrivez vous maintenant" class="form-btn">
            <p>Vous avez déja un compte ? <a href="login_form.php">Connectez vous maintenant</a></p>
        </form>






    </div>
    <div class="container">
        <div class=content>
            <a href="index.html" class="btn">Retour</a>
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