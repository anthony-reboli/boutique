<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title>Paiement</title>
</head>
		<body>
			<header>
				 <?php include("bar-nav.php");?>
			</header>
			<?php
			$id_utilisateurs=$_SESSION['id'];
			$connexion=mysqli_connect("localhost","root","","boutique");
			$req=("SELECT prixtotal FROM panier   where id_utilisateur=$id_utilisateurs");
			$query2=mysqli_query($connexion,$req);
			$res=mysqli_fetch_all($query2);
			
			
			?>

			<h1 class="titre">Le montant total à payer est de:<?php echo $res[0][0]?>€</h1>

			<?php
			
			if (isset($_POST['payer'])) {
				echo "string";

				if (!empty($_POST['nom'])&&!empty($_POST['email'])&&!empty($_POST['adresse'])&&!empty($_POST['code'])&&!empty($_POST['visa'])&&!empty($_POST['amex'])&&!empty($_POST['master'])&&!empty($_POST['codecb'])&&!empty($_POST['nomcb'])&&!empty($_POST['codesec'])&&!empty($_POST['nomcb'])) {
					echo "string2";
					
				}
			}
			?>
			<h1 class="titre">Votre paiement</h1>

			<div id="paiement">
 			<form method="post"><b>
 				<br><label>Votre identité</label><br>
 				Nom:<input type="text" name="nom"><br>
 				Email:<input type="email" name="email"><br>
 			Téléphone:<input type="number" name="tel"><br>
 				<label>Votre adresse de livraison</label><br>
 				Adresse:<input type="text" name="adresse"><br>
 				Code postal:<input type="number" name="code"><br>
 				<label>Information CB</label><br>
 				<label>TYPE CB</label><br>
 				
 				Visa:<input type="radio" name="visa" value="Option1"><br>
 				AMEX:<input type="radio" name="amex"value="Option2"><br>
 				Mastercard:<input type="radio" name="master"value="Option3"><br>
 			
 				<label>Numéro CB</label><br>
 				Code:<input type="number" name="codecb"><br>
 				<label>Code Sécurité</label><br>
 				<input type="" name="codesec"><br>
 				<label>Nom du Porteur</label><br>
 				<input type="text" name="nomcb"><br>
 				<input type="submit" name="payer" value="Payer"><br>	
 			</form>
 			</div>
		
			</body>
</html>



								
							
							
