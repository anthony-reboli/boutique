<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title>Paiement</title>
</head>
		<body id="paiement">

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

			<h1 id="montant">Le montant total à payer est de:<?php echo $res[0][0]?>€</h1>

			<?php
			
			if (isset($_POST['payer'])) {
				
				if (!empty($_POST['select'])&&!empty($_POST['codecb'])&&!empty($_POST['codesec'])&&!empty($_POST['nomcb'])) {
			$id_utilisateurs=$_SESSION['id'];
			$connexion=mysqli_connect("localhost","root","","boutique");
			$req2=("DELETE FROM panier WHERE id_utilisateur=$id_utilisateurs");
			$query3=mysqli_query($connexion,$req2);
		
			
			echo"<p id='validp'> Votre paiement a bien été effectué!<br>Merci de votre visite! <br>A bientot!</p>";
	

				}

			}
			
			?>

			<h1 class="titre">Votre paiement</h1>
			<img id="logopaiement" height="100" width="400" src="upload/paiementsecur.jpg">
			<div id="contpaiement">
 			<form class="formpaiement"method="post"><b>
 				<H2>Information CB</H2><br>
 				<label>TYPE CB</label><br>
 				<label>Choisir:</label><br>
				<select class="formpaiement" name="select"><br>
			    <option class="formpaiement" value="">Choisir option-</option>
			    <option value="visa">Visa</option>
			    <option value="master">Mastercard</option>
			    <option value="amex">AMEX</option>
				</select><br>
 				<label>Numéro CB</label><br>
 				<input class="formpaiement" type="number" name="codecb"><br>
 				<label>Code Sécurité</label><br>
 				<input class="formpaiement" type="number" name="codesec"><br>
 				<label>Nom du Porteur</label><br>
 				<input class="formpaiement" type="text" name="nomcb"><br>
 				<button id="btpayer" name="payer"><img width="50" height="30" src="upload/boutonpayer.png"></button><br>	
 			</form>
 			</div>
		
			
		<footer>
		<?php include("footer.php");?>
		</footer>
	</body>
</html>



								
							
							
