<?php 
    require_once('identifier.php');
    require_once('connexiondb.php');
    if(isset($_POST['nomF']) and isset($_POST['niveau']) and isset($_POST['module']))
    {
        $nomf=$_POST['nomF'];
        // $fich=isset($_POST['fich'])?$_POST['fich']:"";
          $fichier=$_FILES['fich']['name'];
            // echo $fichier;
            // die();
            $imageTemp=$_FILES['fich']['tmp_name'];
            move_uploaded_file($imageTemp,"images/".$fichier);
            $idClasse=isset($_POST['idClasse'])?$_POST['idClasse']:1;
            $idModule=isset($_POST['idModule'])?$_POST['idModule']:1;
            $enseignant_id=$_SESSION['user'];
            $requete="insert into cours(nomCours,url,enseignant_id,idClasse,idModule) values(?,?,?,?,?)";      
            $params=array($nomf,$fichier,$enseignant_id,$idClasse,$idModule);
            $resultat=$pdo->prepare($requete);
        
            $resultat->execute($params);
      
        
        //  $enseignant_id = 20;
        // $enseignant_id=isset($_POST['enseignant_id'])?$_POST['enseignant_id']:1;
        
        
        
        header('location:cours.php');
    
    }
    ?>
    
    
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle ressources</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
</head>
<body>

 <!-- include("menu.php");  -->

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="cours.php" class="navbar-brand">Gestion des Modules</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="historique.php">
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

 <!-- menu -->
 
        
<div class="container">
                       
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Veuillez saisir les données de la nouvelle filère</div>
            <div class="panel-body">
                <form method="post" action="" class="form" enctype='multipart/form-data' multiple="true">

						
                <div class="form-group">
                    <label for="niveau">Nom Cours:</label>
                     <input type="text" name="nomF"  placeholder="Nom de la filière"
                                   class="form-control" required/>
                </div>
                        
                <div class="form-group">
                     <label for="fich">Fichier:</label> 
                     <input type="file" name="fich" accept = "*" placeholder="Fichier" class="form-control"/>
                 </div>

                 <div class="form-group">
                        <label for="niveau">Niveau:</label>
				            <select name="niveau" class="form-control" id="niveau">
                            <?php $reponse = $pdo->query('SELECT * FROM classe ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $donnees['idClasse']; ?>"> 
					    <?php echo $donnees['nomClasse']; ?>
					</option>
					<?php } ?>
				            </select>
                        </div>

                        <div class="form-group">
                        <label for="niveau">Module:</label>
				            <select name="module" class="form-control" id="niveau">
                            <?php $reponse = $pdo->query('SELECT * FROM module ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $donnees['idModule']; ?>"> 
					    <?php echo $donnees['nomModule']; ?>
					</option>
					<?php } ?>
				            </select>
                        </div>
                        
				    <input type="submit" value="Enregistrer" class="btn btn-success">
                            <!-- <span class="glyphicon glyphicon-save"></span>  -->
                             
                      
					</form>
                    </div>
                </div>
            </div>
            
        </div>      
</body>
</HTML>