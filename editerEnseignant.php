<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteS="select * from enseignant where idEnseignant=$idS";
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nom=$stagiaire['nom'];
    $prenom=$stagiaire['prenom'];
    $login=$stagiaire['login'];
    $password=$stagiaire['password'];
    $civilite=($stagiaire['civilite']);
    $idFiliere=$stagiaire['idFiliere'];
    $nomPhoto=$stagiaire['photo'];

    $requeteF="select * from classe";
    $resultatF=$pdo->query($requeteF);

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un enseignant</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
         <!-- include("menu.php"); ?> -->
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
<!-- nav -->
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'enseignant :</div>
                <div class="panel-body">
                    <form method="post" action="updateEnseignant.php" class="form" style="width:50%;  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idS">id de l'enseignant: <?php echo $idS ?></label>
                            <input type="hidden" name="idS" class="form-control" 
                            value="<?php echo $idS ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" 
                            value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">login:</label>
                            <input type="text" name="login" placeholder="login" class="form-control" 
                            value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">password:</label>
                            <input type="text" name="pwd" placeholder="password" class="form-control"
                                   value="<?php echo $password ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>
                       
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
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