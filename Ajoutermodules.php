<?php 
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once('connexiondb.php');
    if(isset($_POST['nomF']) )
    {
        $nomf=$_POST['nomF'];
       
        $requete="insert into module(nomModule) values(?)";
       
        $params=array($nomf);
        $resultat=$pdo->prepare($requete);
        
        $resultat->execute($params);
        
        
        header('location:EnseignantResp.php');
    
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
                <?php echo  ' '.$_SESSION['prenom']. ' '.$_SESSION['nom']?>
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
        <div class="panel-heading">Veuillez saisir le nouveau module</div>
            <div class="panel-body">
                <form method="post" action="" class="form" enctype='multipart/form-data' multiple="true">

						
                <div class="form-group">
                    <label for="niveau">Nom Module:</label>
                     <input type="text" name="nomF"  placeholder="Nom du module"
                                   class="form-control" required/>
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