<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
 // connexion à la base de données
 include "connect.php";

 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $username = mysqli_real_escape_string($connect,htmlspecialchars($_POST['username'])); 
 $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));


 if($username !== "" && $password !== "") // si les champs ne sont pas vides
 {
 $requete = "SELECT count(*) FROM utilisateurs where 
 login = '".$username."' and password = '".$password."' ";
 $exec_requete = mysqli_query($connect,$requete); 
 $reponse = mysqli_fetch_array($exec_requete); // on récupère le résultat sous forme d'un tableau
 $count = $reponse['count(*)']; 
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['username'] = $username;
 header('Location: Index.php');
 }
 else
 {
 header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 
 header('Location: login.php');
}
mysqli_close($connect); // fermer la connexion
?>