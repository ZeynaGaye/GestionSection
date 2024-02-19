<?php
    session_start();
    // if(!isset($_SESSION['use'])) {
    //     header('location:authEnseignant.php');
    //     exit();
    // }

    require_once('connexiondb.php');

    $idusers=isset($_POST['iduser'])?$_POST['iduser']:0;

    $nom=isset($_POST['nom'])?$_POST['nom']:"";

    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";

    $NumCarte=isset($_POST['adresse'])?$_POST['adresse']:"";

    $tel=isset($_POST['tel'])?$_POST['tel']:"";

    $email=isset($_POST['email'])?$_POST['email']:"";

    $login=isset($_POST['login'])?$_POST['login']:"";

   
    
    $requete="update etudiant set nom=?, prenom=?,adresse=?,tel=?,email=?,login=? where iduser=?";

    $params=array($nom,$prenom,$login,$email,$NumCarte,$idClasse,$idEtudiant);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:accueilAdmin.php');
?>
