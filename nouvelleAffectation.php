<?php 
session_start();
// if(!isset($_SESSION['use'])) {
//     header('location:authEnseignant.php');
//     exit();
// }
require_once('connexiondb.php');
$classe = $_SESSION['classe'];
        if(isset($_POST['module']))
        {
    
              $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
    
              $module=isset($_POST['module'])?$_POST['module']:"";

              $requete="insert into affecter_module(enseignant_id,idModule) values(?,?)";
              $params=array($niveau,$module);
              $resultat=$pdo->prepare($requete);
              $resultat->execute($params);
        if($resultat)
            {
                echo" ajout av";
                header('location:gestion.php');
            }
    
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
    
        <a href="Etudiant.php" class="navbar-brand">Gestion des Etudiants</a>
        
    </div>
    
    <ul class="nav navbar-nav">
                
        <li>
            <a href="EnseignantResp.php">
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

 <!-- menu -->

 

 
        
<div class="container">
                       
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Nouvelle Affectation</div>
            <div class="panel-body">
                <form method="post" action="" class="form">
						
                
                 <div class="form-group">
                        <label for="niveau">Professeur:</label>
				            <select name="niveau" class="form-control" id="niveau">
                            <?php $reponse = $pdo->query('SELECT * FROM enseignant ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $donnees['idEnseignant']; ?>"> 
					    <?php echo $donnees['prenom'],' ',$donnees['nom'] ; ?>
					</option>
					<?php } ?>
				            </select>
                        </div>

                        <div class="form-group">
                        <label for="niveau">Module:</label>
				            <select name="module" class="form-control">
                            <?php $reponse = $pdo->query('SELECT * FROM module');
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