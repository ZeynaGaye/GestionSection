<?php
    // session_start();
        // if(isset($_SESSION['user']))
        // {
            require_once('connexiondb.php');
            if(isset($_GET['idF']))
            {
                $id = $_GET['idF'];
                $req = "delete from historique where  idCours=$id";
                $resH=$pdo->exec($req);
                if($resH)
                {
                   $requete="delete from cours where idCours=$id";
                   $res=$pdo->exec($requete);

                  if($res)
                  {
                    $requete= "delete from cours where idCours=$id";
                    $res = $pdo->exec($requete);
                    header('location:cours.php');
                  }
                }

                

            }
            
            
            
    
    
    
    
?>