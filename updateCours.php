<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";

    $url=isset($_POST['fich'])?$_POST['fich']:"";

    $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

    $module=isset($_POST['module'])?strtoupper($_POST['module']):"";
    
    $requete="update cours set nomCours=?,url =?, idClasse=?, idModule=? where idCours=?";

    $params=array($nomf,$url,$niveau,$module,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:cours.php');
?>
