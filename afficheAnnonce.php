
<?php
 session_start();
if(!isset($_SESSION['nom']))
// {
  // header("location:login.php");
// }
 



//  require("connexiondb.php");
// $module=isset($_GET['module'])?$_GET['module']:"";
// $niveau=isset($_GET['niveau'])?$_GET['niveau']:"l1";
// // $size=isset($_GET['size'])?$_GET['size']:6;
// // $page=isset($_GET['page'])?$_GET['page']:1;

// if($niveau=="l1"){
//   $requete="select * from classe
//           where nomClasse like '%$niveau%'
         
//           ";
// }
// else
// {
//   $requete="select * from classe join module
//   where nomModule like '%$module%'
//   and nomClasse='$niveau'
 
//   ";
// }
// $resultatF=$pdo->query($requete);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ETUDIANT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
   
  
  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  -->
  <!-- Vendor CSS Files-->
   <!-- <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> 
   <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">  -->
  

   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> --> -->
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
 
  <style>
    .form-inline
    {
       margin-bottom:30px
    }
  </style>
</head>
<body id="container">
 
    <header>

    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top" style="color:white;background-color:gray;font-weight:bold">
    <div class="container">
    <div style="font-weight:bold;font-style:italic;padding-right:20%">
     <?php
           echo $_SESSION['prenom']."<br>";
           echo $_SESSION['nom']."<br>";
           echo $_SESSION['NumCarte']."<br>";
     ?>
  </div>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="etudiantAccueil.php" style="color:white;style="color:skyblue >SECTION <em style="color:skyblue;font-size:20px"><span class="color-b; font-weight:bold">INFORMATIQUE </em></span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="etudiantAccueil.php"><i class="bi bi-house"style="font-size:40px;"></i>Home</a>
          </li>
        
      </div>

        </ul>
    </div>
  </nav><!-- End Header/Navbar -->
 
  </section>
  </header>
</div>
</div>
<?php
// session_start();
?>
<style>
   table:hover
  { 
      margin-top:80px; 
      background-color:skyblue;
      width:90%;
      padding-top:20px;
      box-shadow:8px 8px 8px gray;
      font-size:20px;
      text-align:center;
      margin:auto;
  } 
  /* table
  {   margin-top:40px;                    
      background-color:rgb(140, 137, 135);;
      width:80%;
      padding-top:20px;
      box-shadow:8px 8px 8px skyblue;
      font-size:20px;
      text-align:center;
  } */
 </style>
<?php
  $pdo = new PDO("mysql:host=localhost;dbname=gestion_section",
  "root", "");
       $consule="select * from cours c ,module m,etudiant e where m.idModule=c.idModule 
              and e.idEtudiant=".$_SESSION["idEtudiant"]. " and c.idCours NOT IN
              (select idCours from historique  where idEtudiant=".$_SESSION["idEtudiant"].")";
       $resul = $pdo->query($consule);
              
       echo"<table class='table table-striped table-bordered '>";
       echo"<tr>";
       echo"<td>Nom Module</td>";
       echo"<td>Nom cours</td>";
            
            
        echo"<td>Action</td>";
         echo"</tr>";
        while($ligne = $resul->fetch())
       {
           $url=$ligne['url'];
           echo"<tr>";
           echo"<td>$ligne[nomModule]</td>";
           echo"<td>$ligne[nomCours]</td>";
               
          echo"<td><a id='cli' href='voir.php?url=".$url."&idC=".$ligne['idCours']."'>consulter</a></td>";
          echo"</tr>";
        }     
        echo"</table>";
?>

</body>
</html>