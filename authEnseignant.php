<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/monstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Se connecter :</div>
        <div class="panel-body">
            <form method="post" action="connEnseignant.php" class="form">

                <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" name="login" placeholder="Login"
                           class="form-control" autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label for="pwd">Mot de passe :</label>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"/>
                </div>

                <button type="submit" name="se-connecter" class="btn btn-success">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter
                </button>
                <p class="text-right">
                    <a href="InitialiserPwd.php">Mot de passe Oublié</a>

                    <!-- <a href="newEtudiant.php">Créer un compte</a> -->
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</HTML>
