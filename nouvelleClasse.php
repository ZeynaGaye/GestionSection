<?php 
    require_once('identifier.php');
    require_once('connexiondb.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle matiere</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .form
            {
                width: 300px;
                text-align:center;
                background-color:;
            }
            /* .container
            {
                background-color:#820
            } */
            body
            {
                background-image:url("st4.avif")
            }
        </style>
    </head>
    <body>
         <!-- include("menu.php");?> -->


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
				<a href="#">
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
        <?php
        $nomPrenom=isset($_POST['nomf'])?$_POST['nomf']:"";
        $idclasse=isset($_POST['idens'])?$_POST['idEns']:"";
         $requeteClasse="select* from enseignant";
         $resultatClasse=$pdo->query($requeteClasse);
        ?>
        <div class="container" style="width: 600px; ">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading" style="color:black; font-size:20px;">Veuillez saisir les données de la nouvelle classe</div>
                <div class="panel-body">
                    <form method="post" action="insertClasse.php" class="form" style="text-align:center;">
                        <div class="form-group">
                             <label for="niveau">Nom de la  classe </label>
                            <input type="text" name="nomf" 
                                   placeholder="Nom de la classe"
                                   class="form-control"/>
                        </div>
                        </div>
                        <div class="form-group">
                             <label for="niveau"onchange="this.form.submit()">Professeur Responsable de la classe</label>
                             <select name="idEns" class="form-control" id="idEns"
                                    onchange="this.form.submit()">
                                    
                                    
                                    
                                <?php while ($classe=$resultatClasse->fetch()) { ?>
                                     <!-- <option value="0">Enseignant</option> -->
                                    <option value="<?php echo $classe['idEnseignant'] ;?>"
                                    
                                        <?php  echo $classe['prenom'],' ',$classe['nom'] ; ?> 
                                           selected >
                                        
                                        <?php echo $classe['nom'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                              </select>
                        </div>
                        
				        <button type="submit" class="btn btn-success" style="text-align:center;margin-left:220px;margin-bottom:50px">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>
            
        </div>      
    </body>
</HTML>