<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    $id = $_SESSION['user'];
    $recherche = $pdo->query('SELECT * FROM classe ');
    $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
    $nom=isset($_GET['nom'])?$_GET['nom']:"";
    $module=isset($_GET['idCours'])?$_GET['idCours']:"0";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $ens=$_SESSION['user'];
    if($module=="0"){
        $requete="select * from cours 
                where nomCours like '%$nomf%' and enseignant_id=$ens
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from cours
                where nomCours like '%$nomf%' and enseignant_id = $id ";
    }else{
         $requete="select * from cours
                where nomCours like '%$nomf%'
                and idModule='$module'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from cours
                where nomCours like '%$nomf%'
                and idModule='$module' and enseignant_id = $id";
    }

    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrFiliere=$tabCount['countF'];
    $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrFiliere/$size;   
    else
        $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des cours</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="cours.php" class="navbar-brand">Gestion des Modules</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="afficheHistorique.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Consulter historique
                </a>
            </li>
			
			
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
            <a href="#">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['prenom'].' '.$_SESSION['nom']?>
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
         <!-- include("menu.php");  -->
        
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des cours</div>
				<div class="panel-body">
					
					<form method="get" action="cours.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nom" 
                                   placeholder="Nom du module"
                                   class="form-control"
                                   value="<?php echo $nom ?>"/>
                                   
                        </div>
                        
                        <label for="niveau">Niveau:</label>
			            <!-- <select name="niveau" class="form-control" id="niveau" -->
                             <!-- onchange="this.form.submit()"> -->
                             
                             <!-- while ($donnees = $reponse->fetch()) -->
									<!-- { -->
									<!-- ?> -->
					<!-- <option value="echo $donnees['idClasse']; ?>">  -->
					     <!-- echo $donnees['nomClasse']; ?> -->
					<!-- </option> -->
					 <!-- } ?> -->
			            <!-- </select> -->

                        <select name="module" class="form-control" id="module"
                                    onchange="this.form.submit()">
                                    
                                    <!-- <option value=0>Toutes les filières</option> -->
                                    
                                <?php while ($donnees = $recherche->fetch()) { ?>
                                
                                    <option value="<?php echo $donnees['idClasse'] ?>"
                                    
                                        <?php if($donnees['idClasse']===$nomf) echo "selected" ?>>
                                        
                                        <?php echo $donnees['nomClasse'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php 
                        // if ($_SESSION['user']== '?') {
                            ?>
                       	
                            <a href="nouveauCours.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouveau Cours
                                
                            </a>
                            
                        <?php 
                        // }
                         ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Cours (<?php echo $nbrFiliere ?> Cours)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom Cours</th><th>Fichier</th>
                                <?php 
                                // if ($_SESSION['user']['idEnseignant']== '?') {
                                    ?>
                                	<th>Actions</th>
                                <?php 
                                // }
                                ?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($filiere=$resultatF->fetch()){ ?>
                                <tr>
            
                                    <td><?php echo $filiere['nomCours'] ?> </td>
                                    <td><?php echo "<embed src='images/$filiere[url]'>" ?> </td> 
                                    
                                     <?php 
                                    //  if ($_SESSION['user']['idEnseignant']== '?') {
                                        ?>
                                        <td>
                                            <a href="editerCours.php?idF=<?php echo $filiere['idCours'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le cours')"
                                                href="supprimerCours.php?idF=<?php echo $filiere['idCours'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php 
                                    // }
                                    ?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="cours.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&module=<?php echo $niveau ?>">
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