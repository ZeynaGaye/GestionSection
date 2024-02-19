<?php
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    // $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";

    // $url=isset($_POST['fich'])?$_POST['fich']:"";

    $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

    $module=isset($_POST['module'])?strtoupper($_POST['module']):"";
    
    $requete="update affecter_module set enseignant_id=?, idModule=? where idAffect=?";

    $params=array($niveau,$module,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:gestion.php');
?>
