<?php
        session_start();
        if(!isset($_SESSION['use'])) {
            header('location:authEnseignant.php');
            exit();
        }
        if(isset($_SESSION['use'])){
            
            require_once('connexiondb.php');
            
            $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update etudiant set etat=? where idEtudiant=?";
            
            $params=array($newEtat,$idUser);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:Etudiant.php');
            
     }else {
                header('location:authEtudiant.php');
        }
?>