<?php
 
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idf=isset($_GET['idClasse'])?$_GET['idClasse']:0;
    $idclasse=isset($_GET['idens'])?$_GET['idEns']:"";
    $requete="select * from classe where idClasse=".$_GET['idClasse'];
    $requeteClasse="select* from enseignant";
     $resultatClasse=$pdo->query($requeteClasse);
    $resultat=$pdo->query($requete);
    $filiere=$resultat->fetch();
    // var_dump($filiere);
    // die();
     $nomf=$filiere['nomClasse'];
    
    // $IDf=$filiere['idClasse'];
    
    
//     $niveau=strtolower($filiere['niveau']);
 ?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une classe</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <style>
        .container
        {
            width: 600px;
        }
        .btn 
        {
            text-align:center;
        }
    </style>
    <body>
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
                       
             <div class="panel panel-primary margetop60 ">
                <div class="panel-heading">Edition de la  classe :</div>
                <div class="panel-body">
                    <form method="post" action="updateClasse.php" class="form">
						<div class="form-group">
                             <label for="niveau">id de la classe: </label>
                            <input type="text" name="idF" 
                                   class="form-control"
                                    value="<?php echo $_GET['idClasse']; ?>"/>
                                   
                                    
                        </div>
                        
                        <div class="form-group">
                             <label for="niveau">Nom de la classe:</label>
                            <input type="text" name="nomf" 
                                   placeholder="Nom de la classe"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="idClasse" value=<?php echo $_GET['idClasse'] ?>>
                             <label for="niveau">Professeur Responsable de la classe</label>
                             <select name="idEns" class="form-control" id="idEns">
                                    
                                    
                                    
                                <?php while ($classe=$resultatClasse->fetch()) { ?>
                                
                                    <option value="<?php echo $classe['idEnseignant'] ;?>">
                                        
                                        <?php echo $classe['prenom']." " .$classe['nom'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                              </select>
                        </div>
                        
				        <button type="submit" class="btn btn-success marginleft20">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>