<?php
session_start();
require_once('connexiondb.php');
if(isset($_POST['login']) and isset($_POST['pwd']))
{
    $login=$_POST['login'];

    $pwd=$_POST['pwd'];


     $req= "select * from enseignant as E, classe as R where
     E.idEnseignant = R.enseignant_id 
     and login ='$login' and password = '$pwd'";


    $result=$pdo->query($req);
     
    // var_dump($result);
    // die();

 
 if($use=$result->fetch())
 
 {
    $_SESSION['use']=$use['idEnseignant'];
    $_SESSION['login']=$use['login'];
    $_SESSION['classe']=$use['idClasse'];
    $_SESSION['nom']=$use['nom'];
    $_SESSION['prenom']=$use['prenom'];
    $_SESSION['mdp']=$use['password'];

    // $_SESSION['use']=$use['login'];
    header('location:EnseignantResp.php'); 
}

else{
    $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header('location:authEnseignant.php');
}

}

