<?php
    session_start();
    require_once('connexiondb.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select *
                from etudiant where login='$login' 
                and pwd=('$pwd')";
                // var_dump($requete);
                // die();
    
    $resultat=$pdo->query($requete);

    if($etud=$resultat->fetch()){
        $_SESSION['idEtudiant']=$etud["idEtudiant"];
        $_SESSION['nom']=$etud['nom'];
        $_SESSION['prenom']=$etud['prenom'];
        $_SESSION['NumCarte']=$etud['NumCarte'];
        $_SESSION['classe']=$etud['idClasse'];
        

       
        if($etud['etat']==1){
            
            $_SESSION['user']=$etud;
            header('location:etudiantAccueil.php');
            
        }else{
            
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:authEtudiant.php');
        }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:authEtudiant.php');
    }

?>
