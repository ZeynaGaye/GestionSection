<?php
function afficheCours()
{
 if(isset($_POST['consulter']))
     {
       $rech=$_POST['consulter'];
       $requete="SELECT idCours, nomCours, url from cours";
       $res=$pdo->query($requete);
     // A CORRIGER CA SE FERME PAS ICI
?>                                                        

<div class="panel panel-primary">
<div class="panel-heading">Liste des Cours (<?php echo $nbrCours ?> cours)</div>
   <div class="panel-body">
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
             <th>Type de fichier</th> <th>nom cours</th> <th>Supprimer</th> 
        </tr>
    </thead>
                                    
    <tbody>
    <?php while($user=$res->fetch()){ ?>
        <tr>
            <td><?php echo $user['nomCours'] ?> </td>
            <td> <a href='$url'></a> </td>
            <td> <button class = btn btn-danger><a href= "enseignant.php"?id_supp>Supprimer</a></button></td>
    <?php } ?>
    
    </tr>

    </tbody>
   </table>
    <!-- }
    
  </div>
</div>  -->

          
<?php } ?> 
<?php } ?>     