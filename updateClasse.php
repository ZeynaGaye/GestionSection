<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    if(isset($_POST['idF'])&&(isset($_POST['idClasse'])&&isset($_POST['idEns'])))
    { 
       $requete="update classe set nomClasse=?,enseignant_id=? where idClasse=?";   
      $params=array($_POST['nomf'],$_POST['idEns'],$_POST['idF']);
   
      $resultat=$pdo->prepare($requete);
   
      if($resultat->execute($params))
      {
         echo"modification  reussi!";
         header('location:classe.php');
      }
      echo" echec de la modification";
    }
    else{
      echo"parametres";
    }
    // $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";
    
    
    
?>
