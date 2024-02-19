<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from cours where idCours=$idf";
    $resultat=$pdo->query($requete);
    $filiere=$resultat->fetch();
    $nomf=$filiere['nomCours'];
    $module=strtolower($filiere['idModule']);
    $classe=strtolower($filiere['idClasse']);
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un cours</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    </head>
    <body>
         <!-- include("menu.php"); ?> -->

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
                <div class="panel-heading">Edition du cours :</div>
                <div class="panel-body">
                    <form method="post" action="updateCours.php" class="form">
						<div class="form-group">
                             <label for="niveau">id du cours: <?php echo $idf ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $idf ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="niveau">Nom du cours:</label>
                            <input type="text" name="nomF" 
                                   placeholder="Nom du cours"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                        </div>
                        <div class="form-group">
                     <label for="fich">Fichier:</label> 
                     <input type="file" name="fich" placeholder="Fichier" class="form-control"/>
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
				            <select name="module" class="form-control" id="module">
                            <?php $reponse = $pdo->query('SELECT * FROM module ');
                              while ($donnees = $reponse->fetch()){?>

					<option value="<?php echo $donnees['idModule']; ?>"> 
					    <?php echo $donnees['nomModule']; ?>
					</option>
					<?php } ?>
				            </select>
                        </div>
                        
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>