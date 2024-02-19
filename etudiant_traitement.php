<?php 



session_start();     
        $user= 'root';
        $mdp = '';
        $connexion = 'mysql:host=localhost;dbname=Section-informatique';
        $create = new PDO($connexion,$user,$mdp);
	if(isset($_POST['login']) && isset($_POST['pwd']))
	{
                $email = $_POST['login'];
                $password = $_POST['pwd'];
		if($create)
		{
			$requete = "select *from etudiant
			where login = '$email' and password = '$password'";
			$resul = $create->query($requete);
			if($ligne=$resul->fetch())
			{
			$recup_id = $ligne[0];
	                $recup_lastName = $ligne[1]; 
			$recup_firstName = $ligne[2];
			$verif_email = $ligne[4];
			$verif_num=$ligne[5];
			$verif_password = $ligne[7];
			$classe_id = $ligne[8];
			// echo".$recup_firstName.";
			// echo".$recup_lasttName.";
			$_SESSION['info']='etudiant';
			$_SESSION['prenom']=$recup_firstName;
			$_SESSION['nom']=$recup_lastName;
			$_SESSION['numCarte']=$verif_num;
			$_SESSION['connecter']=true;
			$_SESSION['idEtudiant']=$recup_id;
			$_SESSION['idClasse']=$classe_id;
			header("Location:etudiantAccueil.php");
			}
			else
			{
				 $_SESSION['erreurLogin']="login incorrect!";
				header("Location:login.php");

			}
			
			
			
			}
		}
	$create = null;


        
 ?>