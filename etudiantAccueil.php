
<?php
 session_start();
if(!isset($_SESSION['nom']))

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ETUDIANT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
   
    <link rel="stylesheet"  href="bootstrap-icons/bootstrap-icons.css">
  <!-- Google Fonts -->
  
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
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
  <?php 
   require("connexiondb.php");
  ?>
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
      <a class="navbar-brand text-brand" href="acceuil.php" style="color:white;style="color:skyblue >SECTION <em style="color:skyblue;font-size:20px">
      <span class="color-b; font-weight:bold">INFORMATIQUE </em></span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="acceuil.php"><i class="bi bi-house"style="font-size:40px;"></i></a>
          </li>
        
      </div>

 <?php
 $pdo = new PDO("mysql:host=localhost;dbname=gestion_section",
 "root", "");
 $n=0;
      $consule="select count(c.idCours) from cours c ,module m,etudiant e where m.idModule=c.idModule 
             and e.idEtudiant=".$_SESSION["idEtudiant"]. " and c.idCours NOT IN
             (select idCours from historique  where idEtudiant=".$_SESSION["idEtudiant"].") group by c.idCours";
             $a=$pdo->query($consule);
             $n=$a->rowCount();
            
 ?>
      <!-- <li class="nav-item"> -->
            <a class="nav-link " href="afficheAnnonce.php"style="font-size:25px;text-align:center;
            margin-bottom:2%;margin-right:10%"><i class="bi bi-bell" > 
              <?php echo $n; ?></i></a>
            <!-- <a class="nav-link " href="editPwd.php" style="margin:10px;font-size:15px ; color:white">

            <i class="bi bi-pencil-square"></i>EDIT PASSWORD</a>

            <a class="nav-link " href="seDeconnecter.php" style="margin:10px;font-size:15px; color:white">

            <i class="bi bi-box-arrow-left"></i> </i>LOGOUT</a> -->
          <li class="nav-item dropdown">
            
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          
          <i class="fa-solid fa-grid-2"></i>Menu
          
          </a>
          
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          
          <li><a class="dropdown-item" href="editPwd.php">Edit Password</a></li>
          
          <li><a class="dropdown-item" href="seDeconnecter.php">Logout</a></li>

               
             
          </select>
            
            </div>
        </ul>
    </div>
  </nav><!-- End Header/Navbar -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel" style = "height: 20%;">



  <!-- Indicators/dots -->
  <div class="carousel-indicators">
         
  <form class="form-inline" style="display:inline" action="" methode="POST">
    <input class=" mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" style="margin-bottom:30%">
    <button class="btn btn-outline-primary my-2 my-sm-0"  style="width='30'" type="submit">Search</button>
    
  </form>
  <div id="ajax"></div>
</nav>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner" >
    <div class="carousel-item active " style="height:600px;">
      <img src="image/img1.jpg" alt="Los Angeles" class="d-block h-100 w-100" >
      <div class="caption">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, vel? </p>
      </div>
    </div>
    <div class="carousel-item " style="height:600px;">
      <img src="image/img2.jpg" alt="Chicago" class="d-block h-100 w-100 ">
      <div class="caption">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, vel? </p>
      </div>
    </div>
    <div class="carousel-item " style="height:600px;">
      <img src="image/img3.jpg" alt="New York" class="d-block h-100 w-100">
      <div class="caption">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, vel? </p>
      </div>
    </div>
    <div class="carousel-item " style="height:600px;">
      <img src="image/dame.jpg" alt="zey" class="d-block h-100 w-100">
      <div class="caption">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, vel? </p>
      </div>
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

  </section>
    </header>
   <?php
     
      include_once("consulter.php");
   
      
  
   ?> 
</div>
</div>
 <script>
    var rech=document.getElementById('search');
    var rech2=document.getElementById('ajax');
    rech=addEventListener('keyup',function(e){
      var url="recherche.php?lib="+rech.value;
      xhr.open("GET",url);
      xhr.send(null);
      xhr.onreadstatechange=function()
      {
        if(xhr.readyState==4 && xhr.status==200)
        {
          rech2.innerHTML=xhr.responseText;
        }
      };
    },false);

 </script>
 <script>
    var rech1=document.getElementById('menu');
    var rech3=document.getElementById('menu1');
    rech1.addEventListener('click',function(e){
      var url="url.php";
      xhr.open("GET",url);
      xhr.send(null);
      xhr.onreadystatechange=function()
      {
        if(xhr.readyState==4 && xhr.status==200)
        {
          rech3.innerHTML=xhr.responseText;
        }
      };

    },false);
 </script>
</body>
</html>