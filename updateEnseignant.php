<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $login=isset($_POST['login'])?$_POST['login']:"";
    $password=isset($_POST['pwd'])?$_POST['pwd']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    // $idcours=isset($_POST['idCours'])?$_POST['idCours']:1;

    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update enseignant set nom=?,prenom=?,login=?,password=?,civilite=?,
        photo=? where idEnseignant=?";
        $params=array($nom,$prenom,$login,$password,$civilite,$nomPhoto,$idS);
    }else{
        $requete="update enseignant set nom=?,prenom=?,login=?,password=?,civilite=? where idEnseignant=?";
        $params=array($nom,$prenom,$login,$password,$civilite,$idS);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:enseignant.php');

?>
