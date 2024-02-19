 <style>
  table:hover
  { 
      margin-top:40px; 
      background-color:skyblue;
      width:90%;
      padding-top:20px;
      box-shadow:8px 8px 8px gray;
      font-size:20px;
      text-align:center;
      margin:auto;
  }
  table
  {   margin-top:40px;                    
      background-color:rgb(140, 137, 135);;
      width:80%;
      padding-top:20px;
      box-shadow:8px 8px 8px skyblue;
      font-size:20px;
      text-align:center;
  }
 </style>
<?php
 function  consulter()
 {
    
require("connexiondb.php");
$classe=$_SESSION['classe'];
$id =$_SESSION['idEtudiant'];

  $consule="select * from cours c ,module m,etudiant e where m.idModule=c.idModule 
              and e.idEtudiant=$id  and c.idClasse = $classe" ;
  $resul = $pdo->query($consule);
              
  echo"<table class='table table-striped table-bordered '>";
  echo"<tr>";
  echo"<td>Nom Module</td>";
  echo"<td>Nom cours</td>";
            
            
  echo"<td>Action</td>";
  echo"</tr>";
while($ligne = $resul->fetch())
{
        $url=$ligne['url'];
        echo"<tr>";
        echo"<td>$ligne[nomModule]</td>";
        echo"<td>$ligne[nomCours]</td>";
                //  echo"<td>$ligne[url]</td>";
        echo"<td><a id='cli' href='voir.php?url=".$url."&idC=".$ligne['idCours']."'>consulter</a></td>";
        echo"</tr>";
}     
        echo"</table>";

                


               
            
            
 }
 
            consulter();
?>
