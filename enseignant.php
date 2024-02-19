<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_POST['nomPrenom'])?$_POST['nomPrenom']:"";
     $idCours=isset($_POST['idCours'])?$_POST['idCours']:0;
    
    $size=isset($_POST['size'])?$_POST['size']:5;
    $page=isset($_POST['page'])?$_POST['page']:1;
    $offset=($page-1)*$size;
    
    // $requete="select * from enseignant e , cours c where e.idEnseignant = c.enseignant_id";

    $requete="select * from enseignant  ";
    if($idCours==0){
        $requeteEnseignant="select c.enseignant_id,nom,prenom,nomCours,civilite,photo 
        from cours as c,enseignant as e
        where c.enseignant_id=e.idEnseignant
        and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
        order by c.enseignant_id
        limit $size
        offset $offset";
                  
        
        $requeteCount="select count(*) countS from enseignant
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }
    else{
        $requeteEnseignant="select e.idEnseignant,nom,prenom,nomCours,civilite,photo 
               from cours as c,enseignant as e
               where c.idCours=e.idCours
               and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
               and c.idCours=$idCours
                order by c.enseignant_id
               limit $size
               offset $offset";
       
       $requeteCount="select count(*) countS from enseignant
               where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
               and idClasse=$idCours";
   }
    $resultat=$pdo->query($requete);
    $resultatEnseignant=$pdo->query($requeteEnseignant);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste==0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des  Enseignants</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
         <!-- require("menu.php"); ?> -->
                  

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="classe.php" class="navbar-brand">Gestion des Classes</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="enseignant.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Enseignants
                </a>
            </li>
			
			<!-- <li><a href="enseignant.php">
                    <i class="fa fa-tags"></i>
                    &nbsp Les Filieres
                </a>
            </li> -->
			
			 <!-- if ($_SESSION['user']['etat']=='1') {
					
				<li><a href="Etudiant.php">
                        <i class="fa fa-users"></i>
                        &nbsp Les Etudiants
                    </a>
                </li>
				
			 } -->
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerEtudiant.php?id=<?php echo $_SESSION['user']['idAdmin'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>

         <!-- menu -->
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des Enseignants</div>
				
				<div class="panel-body">
					<form method="get" action="enseignant.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>   
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['etat']== '1') {?>
                         
                            <a href="nouveauEnseignant.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Enseignant
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Enseignants (<?php echo $nbrStagiaire ?> Enseignant)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                 <th>Nom</th> <th>Prénom</th>
                                <th>civilite</th><th>Photo</th> 
                                <?php if ($_SESSION['user']['etat']== '1') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($enseignant=$resultat->fetch()){ 
                                // var_dump($requete);
                                // die();?>
                                <tr>
                                    <!-- <td><??> </td> -->
                                    <td><?php echo $enseignant['nom'] ?> </td>
                                    <td><?php echo $enseignant['prenom'] ?> </td> 
                                    <!-- <td> echo $enseignant['nomCours'] ?> </td> -->
                                    <td><?php echo $enseignant['civilite'] ?> </td>
                                    <td>
                                        <img src="images/<?php echo $enseignant['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                    
                                     <?php
                                      if ($_SESSION['user']['etat']== '1') {
                                        ?>
                                        <td>
                                            <a href="editerEnseignant.php?idS=<?php echo $enseignant['idEnseignant']?>">
                                                <span class="glyphicon glyphicon-edit">Modifier </span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer cet enseignant')"
                                            href="supprimerEnseignant.php?idS=<?php echo $enseignant['idEnseignant']?>">
                                                <span class="glyphicon glyphicon-trash">Supprimer</span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    <?php }?>
                                    
                                 </tr>
                             
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="enseignant.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idCours=<?php echo $idCours ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        
    </body>
</HTML>
