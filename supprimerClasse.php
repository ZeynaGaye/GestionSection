<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
               $idf=isset($_POST['idF'])?$_POST['idF']:0;
               // $idclasse=isset($_POST['idens'])?$_POST['idEns']:"";
               $requeteStag="select count(*) countStag from enseignant where idEnseignant=$idf";
               $resultatStag=$pdo->query($requeteStag);
               $tabCountStag=$resultatStag->fetch();
               $nbrStag=$tabCountStag['countStag'];
            
            // if($nbrStag==0){
                $requete="delete from classe where idClasse=?";
                $params=array($idf);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:classe.php');
            // }else{
                // $msg="Suppression impossible: Vous devez  supprimer  l'enseignants responsable de la classe";
                // header("location:alerte.php?message=$msg");
            }
            
        //  }else{
                header('location:classe.php');
        // }
    
    
    
    
?>