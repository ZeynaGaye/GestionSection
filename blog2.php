<!DOCTYPE html>
<html lang="en">
<head>
  <title>Image Gallery - Bootstrap 5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="scripts.js"></script>
  <style>
   .cap p
   {
      font-size:140%;
      color:black;
   }
  </style>
</head>
<body>
  

  <section class="gallery min-vh-100">
     <div class="container-lg">
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
           <div class="col">
              <a href="https://disi.ucad.sn/?q=appui-au-tutorat"><img src="image/1.jpg" class="gallery-item" alt="gallery"></a> 
              <div class="cap" id="cap1">
                        <!-- <h2>Clavier</h2> -->
                        <p >Tutorat en ligne</p>
                    </div>
           </div>
           <div class="col">
              <a href="https://studentcenter.ucad.sn/"><img src="image/dame.jpg" class="gallery-item" alt="gallery"></a>
              <div class="cap" id="cap2">
                        <!-- <h2>Clavier</h2> -->
                        <p >Service numérique UCAD</p>
                    </div>
           </div>
           <div class="col">
              <a href="bibliotheque.php"><img src="image/biblio.jfif" class="gallery-item" alt="gallery"></a>
              <div class="cap" id="cap3">
                        <!-- <h2>Clavier</h2> -->
                        <p >Bibliothéque numérique</p>
                    </div>
           </div>
           
        </div>
     </div>
  </section>





</body>
</html>