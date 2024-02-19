<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    

    $idClasse=isset($_POST['idClasse'])?$_POST['idClasse']:0;
    $nom=isset($_POST['nomclasse'])?$_POST['nomclasse']:"";
    $prof=isset($_POST['idEnseignant'])?$_POST['idEnseignant']:"";
    $size=isset($_POST['size'])?$_POST['size']:6;
    $page=isset($_POST['page'])?$_POST['page']:1;
    $offset=($page-1)*$size;
        $req="select idClasse,nomClasse, prenom,nom from enseignant e,classe c
               where e.idEnseignant=c.enseignant_id";

               $requeteCount="select count(*) count from classe
                where nomclasse like '%$nom%'";


    $resultat=$pdo->query($req);
    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrFiliere=$tabCount['count'];
    $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste==0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrFiliere/$size;   
    else
        $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des classes</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
    <?php
    
?>

<!-- menu -->
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
				<div class="panel-heading">Rechercher une classes</div>
				<div class="panel-body">
					<form method="get" action="classe.php" class="form-inline">
						<div class="form-group">
                            <input type="text" name="nomclasse" 
                                   placeholder="Nom de la classe"
                                   class="form-control"
                                   value="<?php echo $nom?>"/>
                                   
                        </div>
                        <!-- <label for="iden">Enseignant responsable</label> -->
                          
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
				    
                        &nbsp;&nbsp;
                       	<?php if ($_SESSION['user']['etat']=='1') {?>
                       	
                            <a href="nouvelleClasse.php">
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouvelle classe 
                            </a>
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des classes(<?php echo $nbrFiliere ?> classes)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Idclasse</th><th>Nom classes</th><th>  professeurs responsables</th>
                                <?php if ($_SESSION['user']['etat']== '1') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($classe=$resultat->fetch()){ ?>
                                <tr>
                                    <td><?php echo $classe['idClasse'] ?> </td>
                                    <td><?php echo $classe['nomClasse'] ?> </td>
                                    <td><?php echo $classe['prenom']." ". $classe['nom'] ?> </td> 
                                    
                                     <?php if ($_SESSION['user']['etat']== '1') {?>
                                        <td>
                                            <a href="editerClasse.php?idClasse=<?php echo $classe['idClasse'] ?>">
                                                <span class="glyphicon glyphicon-edit">Modifier</span>
                                            </a>
                                            &nbsp;
                                            <!-- <a onclick="return confirm('Etes vous sur de vouloir supprimer la classe')"
                                                href="supprimerClasse.php?idClasse= echo $classe['idClasse'] ?>">
                                                    <span class="glyphicon glyphicon-trash">Supprimer</span>
                                            </a> -->
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="classe.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&=<?php echo $niveau ?>">
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