<?php
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once('connexiondb.php');

    $id=isset($_GET['idUser'])?$_GET['idUser']:0;

    $requete="select * from etudiant,classe where idEtudiant=$id";

    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();
    $nom=$utilisateur['nom'];
    $prenom=$utilisateur['prenom'];
    $login=$utilisateur['login'];
    $email=$utilisateur['email'];
    $NumCarte=$utilisateur['NumCarte'];
    $nomClasse=$utilisateur['nomClasse'];

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un Etudiant</title>
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
    ?> -->
        
    </ul>
    
    
    <ul class="nav navbar-nav navbar-right">
                
        <li>
            <a href="editerEtudiant.php?id">
                <i class="fa fa-user-circle-o"></i>
                <?php 
                // echo  ' '.$_SESSION['user']['login']
                ?>
            </a> 
        </li>
        
        <li>
            <a href="DeconnexionEnseignant.php">
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
                <div class="panel-heading">Edition de l'Etudiant :</div>
                <div class="panel-body">
                    <form method="post" action="updateEtudiant.php" class="form">
						<div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="idEtudiant" class="form-control" value="<?php echo $id ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="name">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" 
                            value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="namee">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prenom" class="form-control" 
                            value="<?php echo $prenom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control" 
                            value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Email :</label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                   value="<?php echo $email ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="num">Numéro carte :</label>
                            <input type="text" name="NumCarte" placeholder="numéro carte" class="form-control"
                                   value="<?php echo $NumCarte ?>"/>
                        </div>
                        <div class="input-container">
                        <label for="niveau">Niveau:</label>
				            <select name="niveau" class="form-control" id="niveau">
                            <?php $reponse = $pdo->query('SELECT * FROM classe ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $idClasse; ?>"> 
					    <?php echo $nomClasse; ?>
					</option>
					<?php } ?>
				            </select>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>
