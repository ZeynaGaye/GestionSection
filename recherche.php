<?php
       require("connexiondb.php");
       if($pdo)
       {
       
          if(isset($_GET['lib']))
           {

                $search=$_GET['lib'];
 

   //  echo $_SESSION['idEtudiant'];

       
     
         //  echo $_SESSION['idEtudiant'];
            $rech=$_SESSION['idEtudiant'];
           $requete="select * from cours  where
           nomCours LIKE '$search%' ";
           $resul = $pdo->query($requete);
           echo"<div class='cherche'>";
           echo"<table>";
           echo"<table class='table table-striped table-bordered width:50%'>";
           echo"<td>Nom Module</td>";
           echo"<td>Nom cours</td>";
           echo"<td>Action</td>";
           echo"</tr>";
           while($ligne = $resul->fetch())
  
           {
             echo $ligne['nomCours'];
             
             $idc =$ligne['idCours'];
             echo"<tr>";
              echo"<tbody>";
              echo"<td>$ligne[nomModule]</td>";
              echo"<td>$ligne[nomCours]</td>";
              echo"<td><a href='voir.php?url=$url & idc=$idc>consulter</a></td>";
              echo"</tr>";
           }

       }
       echo"</table>";
      echo"</div>";
 }
 
?>