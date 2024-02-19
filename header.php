<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>acceuil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body
      {
        background:color: #2e6da4;
      }

      .defile 
      {
        margin-left:30%; 
        max-width: 30em;                      /* largeur de la fenêtre */
        margin: 1em auto 2em;
        /* border: 10px solid #F0F0FF; */
        overflow: hidden;                     /* masque tout ce qui dépasse */
        box-shadow: 0 .25em .5em #CCC,inset 0 0 1em .25em #CCC;
     }
     .defile > :first-child
      {
        font-size:150%;
        display: inline-block;                /* modèle de boîte en ligne */
        padding-right: 2em;                   /* un peu d'espace pour la transition */
        padding-left: 100%;                   /* placement à droite du conteneur */
        white-space: nowrap;                  /* pas de passage à la ligne */
        animation: defilement-rtl 15s infinite linear;
      }
      @keyframes defilement-rtl 
      {
      0% {
      transform: translate3d(0,0,0);      /* position initiale à droite */
    }
     100% {
    transform: translate3d(-100%,0,0);  /* position finale à gauche */
    }
}
    </style>
  </head>

<body>


<!-- Barre de menu avec fond bleu -->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="image/logo.jpg" alt="..." height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class = "defile">
    <div >Bienvenue à la section informatique de la faculté des sciences et technique de l'UCAD </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Apropos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Connexion
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="authentification.php">Admin</a></li>
            <li><a class="dropdown-item" href="authEnseignant.php">Enseignant</a></li>
            <li><a class="dropdown-item" href="authEnseignantResp.php">Enseignant Responsable</a></li>
            <li><a class="dropdown-item" href="authEtudiant.php">Etudiant</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>