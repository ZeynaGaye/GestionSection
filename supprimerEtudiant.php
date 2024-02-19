<?php
session_start();
if(!isset($_SESSION['use'])) {
    header('location:authEnseignant.php');
    exit();
}
     require_once('connexiondb.php');
     if(isset($_GET['idUser']))
     {
         $id = $_GET['idUser'];
         $requete="delete from etudiant where idEtudiant=$id";
         $res=$pdo->exec($requete);

         if($res)
         {
             $result= "delete from etudiant where idEtudiant=$id";
             $resultat = $pdo->exec($result);
             header('location:Etudiant.php');
         }

     }
