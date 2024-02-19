<?php
    //  ouvrir la session et securiser la plateforme
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $req = "select * from enseignant";
    $res=$pdo->query($req);
    $requeteFiliere="select * from cours";

    if($idfiliere==0){
        $requeteEnseignant="select nom,prenom,login,nomCours,photo,civilite 
        from cours as f,enseignant as s
        where f.enseignant_id=s.idEnseignant
        and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
        order by idCours
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from enseignant
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }else{
         $requeteEnseignant="
         select idEnseignant,nom,prenom,login,password,nomCours,photo,civilite 
                from cours as f,enseignant as s
                where f.enseignant_id=s.idEnseignant
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idcours=$idfiliere
                 order by idEnseignant
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from enseignant
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idEnseignant=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatEnseignant=$pdo->query($requeteEnseignant);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrEnseignant=$tabCount['countS'];
    $reste=$nbrEnseignant % $size;   
    if($reste===0) 
        $nbrPage=$nbrEnseignant/$size;   
    else
        $nbrPage=floor($nbrEnseignant/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Enseignants</title>
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
        
        <?php 

            ?>
                
            <!-- <li><a href="Etudiant.php">
                    <i class="fa fa-users"></i>
                    &nbsp Les Etudiants
                </a>
            </li> -->
            
        <?php 
    // }
    ?> 
        
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

         <!-- require("menu.php"); -->
         
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des enseignants</div>
				
				<div class="panel-body">
					<form method="get" action="" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                        
                        <div class="form-group">
                        <label for="niveau">Module:</label>
				            <select name="idfiliere" class="form-control">
                            <?php $reponse = $pdo->query('SELECT * FROM module ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $donnees['idModule']; ?>"> 
					    <?php echo $donnees['nomModule']; ?>
					</option>
					<?php } ?>
				            </select>
                                
				            </select>
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php 
                        //  if ($_SESSION['user']['etat']== '1') {
                            ?>
                         
                            <a href="AjouterModules.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Module
                                
                            </a>

                            
                            <a href="annonce.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Ajouter Annonce
                                
                            </a>
                            
                         <?php 
                        // }
                        ?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Enseignants (<?php echo $nbrEnseignant ?> Enseignants)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                 <th>Nom</th> <th>Prénom</th> 
                                <!-- <th>Filière</th> -->
                                 <th>Photo</th> 
                                <?php 
                                // if 
                                // ($_SESSION['user']['etat']== '1') {
                                    ?>
                                	<!-- <th>Actions</th> -->
                                <?php 
                            // }
                            ?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($enseignant=$res->fetch()){ ?>
                                <tr>
                                    
                                    <td><?php echo $enseignant['nom'] ?> </td>
                                    <td><?php echo $enseignant['prenom'] ?> </td> 
                                    <!-- <td><echo $enseignant['nomCours'] ?> </td> -->
                                    <td>
                                        <img src="images/<?php echo $enseignant['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                    
                                     <?php 
                                    //  if ($_SESSION['user']['role']== 'ADMIN') {
                                        ?>
                                        <!-- <td>
                                            <a href="editerEnseignant.php?idS">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer l Enseihnant')"
                                            href="supprimerEnseignant.php?idS=">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td> -->
                                    <?php }?>
                                    
                                 </tr>
                             <?php 
                            // }
                             ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="EnseignantResp.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
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
