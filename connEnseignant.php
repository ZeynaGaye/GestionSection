<?php
session_start();
require_once('connexiondb.php');
if(isset($_POST['login']) and isset($_POST['pwd']))
{
    $login=$_POST['login'];

    $pwd=$_POST['pwd'];


     $requete="select * from enseignant where login='$login' and password= '$pwd' ";

    $resultat=$pdo->query($requete);


     
    // var_dump($result);
    // die();
    
if($user=$resultat->fetch())
 {
     $_SESSION['user']=$user['idEnseignant'];
     $_SESSION['nom']=$user['nom'];
     $_SESSION['prenom']=$user['prenom'];
    
     header('location:Espace_enseignant.php');
    

 }
else{
    $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header('location:authEnseignant.php');
}

}

