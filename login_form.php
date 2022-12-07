
<?php

@include 'config.php';

session_start();

if(isset($_POST['login']) && isset($_POST['password'])){
    
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $pass = md5($_POST['password']);
    

    $select = "SELECT * FROM utilisateurs2 WHERE login = '".$login."' && password = '".$pass."'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if($row['usertype'] == 'admin'){

            $_SESSION['admin_name'] = $row['login'];
            header('Location: admin_page.php');

        }elseif ($row['usertype'] == 'user') {
            
            $_SESSION['user_name'] = $row['login'];
            header('Location: user_page.php');

        }

    }else{
        $error[] = "Login ou mot de passe incorrect";
    }
    
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Formulaire de connexion</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Connectez vous maintenant</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class = "error-msg">'.$error.'</span>';
                }
            }
            ?>
            <input type="text" name="login" required placeholder="Entrez votre login">
            <input type="password" name="password" required placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="connectez vous maintenant" class="form-btn">
            <p>Vous souhaitez créer un compte ? <a href="register_form.php">Inscrivez-vous maintenant</a></p>
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
