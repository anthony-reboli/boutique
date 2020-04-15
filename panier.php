<?php
session_start();
if (isset($_SESSION['login']))
{
 include("bar-nav.php");
 //include("classpanier.php");

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title>Panier</title>
</head>
		<body id="pagepanier">
							<section id="contpanier">

 								<h1 class="titre">Votre Panier</h1>
  				<?php
 							
                                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$id_utilisateurs=$_SESSION['id'];
								$rep= $connexion->query("SELECT * FROM commande INNER JOIN produits ON commande.id_produit=produits.id  WHERE id_utilisateur = $id_utilisateurs");
								$test = $rep->fetchAll();
								//var_dump($test);
								$i=0;
	            				foreach ($test as $values)
								{
						        		if (!empty($values)) {
						        				          
											echo "<table id='contenue' width=400px>";
											echo "<tr>";
											echo "<th class='nom'>Nom produit</th>";
											echo "<th class='nom'>Image</th>";
											echo "<th class='nom' >Quantité</th>";
											echo "<th class='nom'>Prix total</th>";
											echo "</tr>";
											echo "<tr>";
											echo "<td class='nom'>".$values[8]."</td>";
											echo "<td><img heigh=150px width=150px src=\"upload/".$values[11]."\"></td>";
											echo "<td class='nom'>".$values[3]."</td>";
											echo "<td class='nom'>".$values[5]."€</td>";
											echo "</tr>";
											echo "</table>";
											include("quantite.php");
																	
											$i++;
																  
										}
										 
									}

									$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
									$req=$connexion->query("SELECT SUM(prixglobal) FROM `commande` WHERE id_utilisateur=$id_utilisateurs");
									$total = $req->fetchAll();
													   			
									?>
									<p class="nomp">Le montant total est : <?php echo "".$total[0][0].""?>€</p>
									<?php

									if (isset($_POST['ajoutpanier'])) 
									{

									$connexion=mysqli_connect("localhost","root","","boutique");
									$id_utilisateurs=$values[1];
									$id_produits=$values[2];
									$prixtotal=$total[0][0];
									$req="INSERT INTO panier (id_utilisateur,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')";

									$query=mysqli_query($connexion,$req);
									header("location:paiement.php")
									?>	
								
									<?php

									//var_dump($query);	
									
									}
														
							?>
							<form method="post">
								<button class="ajoutpanier"  name="ajoutpanier"/><img width="50" height="50" src="upload/panier.jpg"></button>
							</form>
						</section>
						<footer>
								<?php include("footer.php");?>
						</footer>
	
			</body>
</html>

<?php 
}
else{
	header("location:connexion.php");
}
?>


								
							
							




								
							
							
