<?php
session_start();
?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/monstyle.css">
    <style>
        em{
            color:820;
        }
        h1
        {
            text-align:center;
            color:#800;
        }
        .container
        {
            background-color:
        }
    </style>
</head>
<body style="background-image:url('comp.jpg');">
    <!-- <h1>AUTHENTIFICATION</h1> -->
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4;" style="background">
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Se connecter :</div>
        <div class="panel-body">
            <form method="post" action="etudiant_traitement.php" class="form" style="text-align:justify">

                <div class="alert alert-danger">
                        <?php if (isset($_SESSION['erreurLogin']))
                        {
             echo $_SESSION['erreurLogin']; unset($_SESSION['erreurLogin']);} ?>
                    </div>
                

                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" name="login" placeholder="Login"
                           class="form-control" autocomplete="off"
                           required/>
                </div>

                <div class="form-group">
                    <label for="pwd">Mot de passe:</label>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"
                           required/>
                </div>

                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter
                </button>
                <p class="text-right">
                    <a href="InitialiserPwd.php">Mot de passe Oublié</a>


                    <a href="compteEtudiant.php">Créer un compte</a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</HTML>

</html>