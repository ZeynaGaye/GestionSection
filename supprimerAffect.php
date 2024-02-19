<?php
require_once('connexiondb.php');
if(isset($_GET['idF']))
{
    $id = $_GET['idF'];
    $requete="delete from affecter_module where idAffect=$id";
    $res=$pdo->exec($requete);

    if($res)
    {
        $result= "delete from affecter_module where idAffect=$id";
        $resultat = $pdo->exec($result);
        header('location:gestion.php');
    }

}