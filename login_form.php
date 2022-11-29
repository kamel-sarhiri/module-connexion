<?php

@include 'config.php';

session_start();

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
        $row = mysqli_fetch_array($result);

        if($row['usertype'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('Location: admin_page.php');

        }elseif ($row['usertype'] == 'user') {
            
            $_SESSION['user_name'] = $row['name'];
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
            <input type="text" name="login" required placeholder="Choissisez votre login">
            <input type="password" name="password" required placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="connectez vous maintenant" class="form-btn">
            <p>Vous souhaitez créer un compte ? <a href="register_form.php">Inscrivez-vous maintenant</a></p>
        </form>
    </div>
 </body>
</html>
