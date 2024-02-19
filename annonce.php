<?php 
    session_start();
    if(!isset($_SESSION['use'])) {
        header('location:authEnseignant.php');
        exit();
    }
    require_once('connexiondb.php');

    if (isset($_POST['mess']) && isset($_POST['cla'])){
        $sms=$_POST['mess'];
        $classe = $_POST['cla'];
        $req="insert into annonce(message,idClasse) values(?,?)";
        $res=$pdo->prepare($req);
        $res->execute(
            array($_POST['mess'],$_POST['cla'])
    );
   
    }
          
    ?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <title>Annonce</title>
        <!-- <style>
            h3{
                text-align: center;
                font-style: italic;
                font-family: Arial, Helvetica, sans-serif;
                margin-left: 15%;
                margin-top: 30px;
                margin-bottom: 80px;
                color: red;
            }
            #in{
                margin-left: 50%;
            }
        </style> -->
       
    </head>
    <body>
    
    

<div class="container">
                       
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Ajout annonce</div>
            <div class="panel-body">
                <form method="post" action="" class="form" enctype='multipart/form-data' multiple="true">

						
                <div class="form-group">
                    <label for="niveau">Message:</label>
                    <textarea class="form-control" type="text" id="mess" name="mess" rows="4"
                                   class="form-control" required> 
                     </textarea>
                </div>

                <div class="form-group">
                        <label for="niveau">Niveau:</label>
				            <select name="cla" class="form-control" id="cla">
                            <?php $reponse = $pdo->query('SELECT * FROM classe ');
                              while ($donnees = $reponse->fetch()){?>
                              
					<option value="<?php echo $donnees['idClasse']; ?>"> 
					    <?php echo $donnees['nomClasse']; ?>
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

</html>
