<?php
    // require_once('role.php');
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once("connexiondb.php");
    $classe = $_SESSION['classe'];

    $login=isset($_GET['login'])?$_GET['login']:"";// pour la recherce
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
   
    // $requeteUser="select * from etudiant where login like '%$login%'";
     $requeteUser="select * from etudiant  where idClasse =$classe ";
    $requeteCount="select count(*) countUser from etudiant where idClasse =$classe  ";
   
    $resultatUser=$pdo->query($requeteUser);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrUser=$tabCount['countUser'];
    $reste=$nbrUser % $size;   
    if($reste===0) 
        $nbrPage=$nbrUser/$size;   
    else
        $nbrPage=floor($nbrUser/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Etudiants</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    </head>
    <body>
         <!-- include("menu.php"); -->

         <nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container-fluid">

    <div class="navbar-header">
    
        <a href="Etudiant.php" class="navbar-brand">Gestion des Etudiants</a>
        
    </div>
    
    <ul class="nav navbar-nav">
                
        <li><a href="EnseignantResp.php">
                <i class="fa fa-vcard"></i>
                &nbsp Les Enseignants
            </a>
        </li>
        
        <li><a href="gestion.php">
                <i class="fa fa-tags"></i>
                &nbsp Gestion
            </a>
        </li>
        
        <?php 
        // if ($_SESSION['user']['etat']=='1') {
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

         <!-- menu -->
        
        
        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Rechercher des Etudiants</div>
				<div class="panel-body">
					<form method="get" action="Etudiant.php" class="form-inline">
						<div class="form-group">
                            <input type="text" name="login" 
                                   placeholder="Login"
                                   class="form-control"
                                   value="<?php echo $login ?>"/>
                        </div>
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Etudiants (<?php echo $nbrUser ?> etudiant)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Nom</th> <th>Prénom</th> <th>login</th> <th>Email</th> <th>NumCarte</th> <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$resultatUser->fetch()){ ?>
                                <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                    <td><?php echo $user['nom'] ?> </td>
                                    <td><?php echo $user['prenom'] ?> </td>
                                    <td><?php echo $user['login'] ?> </td>
                                    <td><?php echo $user['email'] ?> </td>
                                    <td><?php echo $user['NumCarte'] ?> </td> 
                                   <td>
                                        <a href="editerEtudiant.php?idUser=<?php echo $user['idEtudiant'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet etudiant')"
                                            href="supprimerEtudiant.php?idUser=<?php echo $user['idEtudiant'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                <a href="activerEtudiant.php?idUser=<?php echo $user['idEtudiant'] ?>&etat=<?php echo $user['etat']  ?>">  
                                                <?php  
                                                    if($user['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                            </a>
                                        </td>       
                                </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="Etudiant.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
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
