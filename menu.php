<?php
    //require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="cours.php" class="navbar-brand">Gestion des Modules</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="EnseignantResp.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Enseignants
                </a>
            </li>
			
			<li><a href="enseignant.php">
                    <i class="fa fa-tags"></i>
                    &nbsp Les Filieres
                </a>
            </li>
			
			<?php if ($_SESSION['user']['etat']=='1') {?>
					
				<li><a href="Etudiant.php">
                        <i class="fa fa-users"></i>
                        &nbsp Les Etudiants
                    </a>
                </li>
				
			<?php }?>
			
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
