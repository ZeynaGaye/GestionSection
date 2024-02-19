<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter module</title>
</head>
<body>
<?php 
session_start();
require_once("connexiondb.php");
?>

<label for=" ">Liste des Enseignants </label>
                  <select name=" "  id=" " required>
			<?php $reponse = $pdo->query('SELECT * FROM enseignant ');
                              while ($donnees = $reponse->fetch())
									{
									?>
					<option value="<?php echo $donnees['idEnseignant']; ?>"> 
					    <?php echo $donnees['nom']; ?>
					</option>
					<?php } ?>
		</select>
</body>
</html>
