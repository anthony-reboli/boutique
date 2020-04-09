
<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" type="text/css" href="boutique.css">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
				<header>
				<?php	include("bar-nav.php");?>
				</header>
				<H1 class="titre">Ma Sélection</H1>
		
					<section id="contenueproduit">
								<?php
 								$retour=$_GET['p'];
								$id_utilisateurs=$_SESSION['id'];
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query("SELECT * FROM produits  INNER JOIN  avis   on produits.id=$retour  where id_utilisateur=$id_utilisateurs");
								$rep=$reponse->fetchAll();
						
      								if (!empty($_GET['p'])) 
      								{

													$i = 0;
														foreach ($rep as $val)
													{
													
															if (!empty($val)) 
														{
															echo "<table width=300px>";
															echo "<tr>";
															echo "<th>Nom produit</th>";
															echo "<th>Description</th>";
															echo "<th>Image</th>";
											
															echo "<th>Prix</th>";
															echo "</tr>";
															echo "<tr>";
															echo "<td>".$val[1]."</td>";
															echo "<td>".$val[3]."</td>";
															echo "<td><img heigh=800px width=800px src=\"upload/".$val[4]."\"></td>";
															echo "<td>".$val[2]."€</td>";
															echo "</tr>";
															echo "</table>";
															$i ++;
														}
															else
														{
											
															echo "Veuillez choisir un produit!";
					    								}

					    							}
								    		}
								    		?>
								    		<div id="qts">
								    			<H2 class="titre">Entrer une quantité</H2>
								    		<?php

									
    										if (empty($_POST['quantiteproduit'])) 
    										{

	    									//echo "Veuillez entrer une quantité à ajouter au panier";
	    									?>
	    									<form class="titre" method="post" >
	    									<input type="number" name="quantiteproduit" min="1" max="10"/><br>
	    									<input  type="submit" name="valider2" value="valider">

	    									</form>
	    												<?php

    										}
    										else
    										{
    											$connexion=mysqli_connect("localhost","root","","boutique");
    											$retour=$_GET['p'];
    											$qtt=$_POST['quantiteproduit'];
    											$quantiteproduit=$val[2];
    											$prixglobal=$qtt*$quantiteproduit;
    											$req2="INSERT INTO commande (id_utilisateur,id_produit,prixproduit,quantiteproduit,prixglobal,dateajout) VALUES ('$id_utilisateurs','$retour','$quantiteproduit','$qtt','$prixglobal',NOW()) ";

    											$query2=mysqli_query($connexion,$req2);
    								
    											?>
								<?php
								
    										}
    							
							?>
							</div>
						</section>
						
				
			</body>
</html>
