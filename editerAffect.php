<?php
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once('connexiondb.php');
    $idf=($_GET['idF']);
    if(isset($_GET['idF']))
    {
       

        $requete="select * from affecter_module where  idAffect = $idf";
    
        $resultat=$pdo->query($requete);
    
        $filiere=$resultat->fetch();
    
        $enseignant=strtolower($filiere['enseignant_id']);
    
        $module=strtolower($filiere['idModule']);      
    }
    
    
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une Affectation</title>
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
                <div class="panel-heading">Edition de l'Affectation :</div>
                <div class="panel-body">
                <form method="post" action="updateAffect.php" class="form">
                    <div class="form-group">
                             <label for="niveau">id de l'Affectation: <?php echo $idf ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $idf ?>"/>
                        </div>
                        
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