<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet"  href="bootstrap-icons/bootstrap-icons.css">
	<title>Document</title>
	<style>
		body
		{
			/* position:absolute; */
			background : skyblue;
			bottom: 0;
			padding-top:5%;
		}
		a
		{
		  color:black;	
		}
		
		h2
		{
			text-decoration:underline;
		}

	</style>
</head>
<body >
<div class ="w-100 bg-secondary " id="contact">
<footer id = "corp" class = "container">
		
<div class="row ">

	<div class= "col">
	
	<h2>Contact info</h2>
	<h4>Adresse: </h4>
	<p>Univercité Cheick Anta Diop</p>
	<h4><i class="bi bi-telephone"></i></h4>
	<p>33 413 00 21</P>
	<h4><i class="bi bi-envelope"></i></h4>
	<a href="mailto:sectioninformatiqueucad@gmail.com" text-decoration:none>sectioninformatiqueucad@gmail.com</a>
	</br>
	</br>
	<h4>Nos réseaux</h4>
	<i class="bi bi-facebook"></i>
	<i class="bi bi-twitter"></i>
	<i class="bi bi-youtube"></i>
	<i class="bi bi-instagram"></i>


	</div>

	<div class= "col">
	<h2>Formulaire de contact</h2>
	<form action="" method = "post"  class= "col-lg-6">
		<div class = "form-group ">
		      <input type="text" name="nom" placeholder = "nom" class= "form-control" style="margin-bottom:10px">
       </div>
	   <div class = "form-group ">
		      <input type="email" name="mail" placeholder = "Email" class= "form-control" style="margin-bottom:10px">
      </div>
	  <div class = "form-group ">
		      <textarea name="com" id="" cols="30" rows="10" placeholder = "message" class= "form-control" style="margin-bottom:10px ; height:120px" ></textarea>
      </div>	  
	  <button class="btn btn-outline-primary my-2 my-sm-0"  style="width='50'" type="submit">send</button>
	</form>
	
	</div>
	<br>
</div>

</footer>

<div class=" text-center p-3 container" style   >© 2020 Copyright:
    <a href="acceuil.php" > Accueil</a>
  </div>
</div>	
</body>
</html>

