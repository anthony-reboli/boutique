
<?php
session_start();
				$connexion=mysqli_connect("localhost","root","","boutique");
				$user = $_SESSION['id'];
				$id = $_GET['id'];
				$req="SELECT id ,nomproduit,prixproduit FROM `tarif` WHERE 1";
				var_dump($req);
				$query = mysqli_query($connexion,$req);
				$resultat = mysqli_fetch_all($query);
				foreach ($resultat as $resultats) {
					
				}
				var_dump($resultats);
				
if (isset($id)){
	echo "string";
	
	var_dump($req);
	$query1 = mysqli_query($connexion,$req1);
	$resultat1 = mysqli_fetch_all($query1);
}


?>

					
						


<html>
<head>
	<title>Panier boutique</title>
</head>
<body> 
	<div>
		
	</div>



</body>
</html>