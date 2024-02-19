<?php
    // session_start();
        // if(isset($_SESSION['user']))
        // {
            require_once('connexiondb.php');
            if(isset($_GET['idS'])&&(isset($_GET['idClasse'])))
            {
                $idc=$_POST['idClasse'];
                $id = $_GET['idS'];
                $req = "delete from annonce  where  idClasse=$idc";
                $resc=$pdo->exec($req);
                if($resc)
                {
                     $req = "delete from classe  where  idEnseignant=$id";
                $resH=$pdo->exec($req);

                }
                if($resH)
                {
                   $requete="delete from cours where  idEnseignant=$id";
                   $res=$pdo->exec($requete);

                  if($res)
                  {
                    $requete= "delete from enseignant where idEnseignant=$id";
                    $res = $pdo->exec($requete);
                    header('location:enseignant.php');
                  }
                }

                

            }
            
            
            
    
    
    
    
?>