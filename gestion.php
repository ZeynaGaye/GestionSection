<?php
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
    $module=isset($_GET['idModule'])?$_GET['idModule']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    if($module=="all"){
        $requete="select * from affecter_module A, module M where A.idModule = M.idModule
                and nomModule like '%$nomf%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from module
                where nomModule like '%$nomf%'";
    }else{
         $requete="select * from module
                where nomModule like '%$nomf%'
                and idModule='$module'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from module
                where nomModule like '%$nomf%'
                and idModule='$module'";
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


     $ens="select * from enseignant E , module M, affecter_module A where
     E.idEnseignant = A.enseignant_id and M.idModule =A.idModule";
     $res=$pdo->query($ens);

    //  $mod="select * from module";
    //  $resMod=$pdo->query($mod);
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
    
        <a href="Etudiant.php" class="navbar-brand">Gestion des Etudiants</a>
        
    </div>
    
    <ul class="nav navbar-nav">
                
        <li><a href="EnseignantResp.php">
                <i class="fa fa-vcard"></i>
                &nbsp Gestion des Enseignants
            </a>
        </li>
        
         <li><a href="gestion.php">
                <i class="fa fa-tags"></i>
                &nbsp Gestion
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
          
				<div class="panel-heading">Rechercher des Module</div>
				<div class="panel-body">
					
					<form method="get" action="gestion.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomF" 
                                   placeholder="Nom du module"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                                   
                        </div>
                        
                        <label for="niveau">Module:</label>
			            <select name="niveau" class="form-control" id="niveau"
                             onchange="this.form.submit()">
                            <?php $reponse = $pdo->query('SELECT * FROM module ');
                             while ($donnees = $reponse->fetch())
									{
									?>
					<option value="<?php echo $donnees['idModule']; ?>"> 
					    <?php echo $donnees['nomModule']; ?>
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
                       	
                            <a href="nouvelleAffectation.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouvelle Affectation
                                
                            </a>
                            
                        <?php 
                        // }
                         ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste Affectation (<?php echo $nbrFiliere ?> Module)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom Professeur</th><th>Module</th>
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
                            <?php while($filiere=$res->fetch() ){ ?>
                                <tr>
            
                                    <td><?php echo  $filiere['prenom'], ' ', $filiere['nom']?> </td>
                                    <td><?php echo $filiere['nomModule']?> </td> 
                                    
                                     <?php 
                                    //  if ($_SESSION['user']['idEnseignant']== '?') {
                                        ?>
                                        <td>
                                            <a href="editerAffect.php?<?php echo $filiere['idAffect'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer l Affectation ')"
                                                href="supprimerAffect.php?idF<?php echo $filiere['idAffect'] ?>">
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
            <a href="nouvelleAffectation.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&module=<?php echo $niveau ?>">
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