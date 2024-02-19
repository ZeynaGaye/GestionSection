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

<label for=" ">Liste des Classe</label>
            <select name=" "  id=" " required>
			<?php $reponse = $pdo->query('SELECT * FROM classe ');
                              while ($donnees = $reponse->fetch())
									{
									?>
					<option value="<?php echo $donnees['idClasse']; ?>"> 
					    <?php echo $donnees['nomClasse']; ?>
					</option>
					<?php } ?>
		</select>
</body>
</html>
