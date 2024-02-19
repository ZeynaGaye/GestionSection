<?php
session_start();
require_once("connexiondb.php");
 if(isset($_GET['url']) and isset($_GET['idC'])){
    $vu=$_GET['url'];
    $idC=$_GET['idC'];
    $verif = "select * from historique where idEtudiant = '$_SESSION[idEtudiant]' and idCours = $idC ";
    $res=$pdo->query($verif);
    if(!($lign=$res->fetch()))
    {
      $req="insert into historique(idEtudiant,idCours)values($_SESSION[idEtudiant],$idC)";
      $res=$pdo->exec($req);
    }
    else
    {
      
    }
    

   echo"<embed src='images/$vu' type='application/pdf' width='100%' height='500'>";
        
}
?>