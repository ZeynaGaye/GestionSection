<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<?php
require_once('identifier.php');
require("connexiondb.php");
$id=$_SESSION['user'];

// $req1="SELECT * FROM etudiant WHERE idEtudiant IN(SELECT idEtudiant FROM historique WHERE idCours='$idC')";

$req="select * from etudiant e , historique h , cours c 

where e.idEtudiant = h.idEtudiant and h.idCours = c.idCours and enseignant_id = $id";

$res=$pdo->query($req);


while ($ligne=$res->fetch()) {
  
  // echo "<div class=\"alert alert-danger\" role=\"alert\">
      echo "<div class=\"alert alert-danger\" role=\"alert\"> l etudiant  ".$ligne['prenom']." ".$ligne['nom']." ".$ligne['NumCarte']." 
         a Consulter le  ".$ligne['nomCours']." le ".$ligne['date']."
        </div>";
}
   
  
    