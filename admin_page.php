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
 </body>
</html>
