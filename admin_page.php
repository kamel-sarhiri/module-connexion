<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('Location: Index.php');
}

$request = $conn->query("SELECT * FROM utilisateurs2");

?>
<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Page Admin</title>
    <style>
        table, th, td {
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
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
                                    <li><a class='a_head'href='update_profile.php'>Modification profil</a></li>
                                    <li><a class='a_head' href='logout.php'>Déconnexion</a></li>
                                </ul>
                            </nav>";
                        }
                        else {
                            $_SESSION['admin'] = "true";
                            echo "<nav>
                                <ul>
                                    <li><a class='btn'href='update_profileadmin.php'>Modification profil</a></li>
                                    <li><a class='btn' href='logout.php'>Déconnexion</a></li>
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


    <div class="container">
    <!-- zone de connexion -->
        <div class=content>
            <h3>Bonjour, <span>admin</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['admin_name']?></span></h1>
            <p>Vous êtes sur la page admin</p>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while (($result = $request->fetch_array())!= null) 
                {
                    echo "<tr>";
                    echo "<td>".$result["id"]."</td>";
                    echo "<td>".$result["login"]."</td>";
                    echo "<td>".$result["prenom"]."</td>";
                    echo "<td>".$result["nom"]."</td>";
                    echo "<td>".$result["password"]."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <br>

            <a href="update_profileadmin.php" class="btn">Modification de compte</a>
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
