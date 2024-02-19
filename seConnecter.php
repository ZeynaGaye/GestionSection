<?php
    session_start();
    require_once('connexiondb.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select idAdmin,nom,prenom,login,etat
                from admin where login='$login' 
                and pwd=('$pwd')";
    
    $resultat=$pdo->query($requete);

    if($resAdmin=$resultat->fetch()){
       
        if($resAdmin['etat']==1){
            
            $_SESSION['user']=$resAdmin;
            header('location:classe.php');
            
        }else{
            
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:authentification.php');
        }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:authentification.php');
    }

?>
