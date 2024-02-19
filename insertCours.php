<?php
session_start();
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
    $fich=isset($_POST['fich'])?$_POST['fich']:"";
    $imageTemp=$_POST['fich'];
    move_uploaded_file($imageTemp,"images/".$fich);
    
    $enseignant_id=isset($_POST['idEnseignant'])?$_POST['enseignant_id']:1;
    // $enseignant_id = 20;
    $idClasse=isset($_POST['idClasse'])?$_POST['idClasse']:1;
    $idModule=isset($_POST['idModule'])?$_POST['idModule']:1;

    $requete="insert into cours(nomCours,url,enseignant_id,idClasse,idModule) values(?,?,?,?,?)";
   
    $params=array($nomf,$fich,$enseignant_id,$idClasse,$idModule);
    $resultat=$pdo->prepare($requete);
    
    $resultat->execute($params);
    
    header('location:cours.php');
?>