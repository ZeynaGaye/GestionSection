<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"images/".$nomPhoto);

    $requete="INSERT into enseignant(nom,prenom,login,password,civilite,photo) values(?,?,?,?,?,?)";
    $params=array($nom,$prenom,$login,$pwd,$civilite,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:enseignant.php');

?>