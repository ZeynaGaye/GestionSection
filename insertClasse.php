<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['nomf'])?$_POST['nomf']:"";
    // $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";
    $ensResp=isset($_POST['idEns'])?$_POST['idEns']:"";

    $requete="insert into classe(nomClasse,enseignant_id) values(?,?)";
    $params=array($nomf,$ensResp);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    if($resultat)
    {
        echo" ajout av";
        header('location:classe.php');
    }
    
?>