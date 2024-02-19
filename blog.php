<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<style>
  p
  {
    font-size:140%;
  }
</style>
<body style= "height:30%">

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" style = "height: 30%">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner" >
    <div class="carousel-item active " style="height:600px;">
      <img src="image/femme.jpg" alt="Los Angeles" class="d-block h-100 w-100" >
      <div class="caption">
        <p style= "color:black">Bienvenue à la section informatique de la faculté des science et technique de  l'UCAD </p>
      </div>
    </div>
    <div class="carousel-item " style="height:600px;">
      <img src="image/pho.jpeg" alt="Chicago" class="d-block h-100 w-100 ">
      <div class="caption">
        <p style= "color:black">L'Excellence et l'expertige au rendez vous Nous formons les meilleurs ingenieurs dans tous l'Afrique et de l'Ouest </p>
      </div>
    </div>
    <div class="carousel-item " style="height:600px;">
      <img src="image/image4.jpeg" alt="New York" class="d-block h-100 w-100">
      <div class="caption">
        <p style= "color:black">la Section informatique vous offre un large gamme de programme d'etude et d'insertion social  </p>
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



</body>
</html>