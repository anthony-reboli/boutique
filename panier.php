<?php
session_start();
 include("bar-nav.php");
 //include("classpanier.php");

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title>Panier</title>
</head>
		<body>


 								<h1>Votre Panier</h1>
  				<?php
 							
                                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$id_utilisateurs=$_SESSION['id'];
								$rep= $connexion->query("SELECT * FROM commande INNER JOIN produits on commande.id_produit=produits.id  WHERE id_utilisateur = ".$_SESSION['id']."");
								$test = $rep->fetchAll();
								var_dump($test);
								
	            				foreach ($test as $values)
								{
								echo "bonjour2";
								 //var_dump($test->creationPanier($id_utilisateurs));
								
						        		if (!empty($values)) {
						        			
									        	//var_dump($values);
									      
									   			if(isset($_GET['id'])){
			 									echo "bonjour";
			 										
							 									$i=0;
													          
																echo "<table width=250px>";
																echo "<tr>";
																echo "<th>Nom produit</th>";
																echo "<th>Image</th>";
																echo "<th>Quantité</th>";
																echo "<th>Prix total</th>";
																echo "</tr>";
																echo "<tr>";
																echo "<td>".$values[8]."</td>";
																echo "<td><img heigh=150px width=150px src=\"upload/".$values[11]."\"></td>";
																echo "<td>".$values[3]."</td>";
																echo "<td>".$values[5]."€</td>";
																echo "</tr>";
																echo "</table>";
														   			include("quantite.php");
																	
																 $i++;
																  
																	
															}
											else
											{
											echo "Votre Panier est vide!!";
											}

										}
									}
									
									  $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								  $req=$connexion->query("SELECT SUM(prixglobal) FROM `commande` WHERE id_utilisateur=$id_utilisateurs");
													   			$total = $req->fetchAll();
													   			var_dump($total);
							?>
			
							<p>Le montant total est : <?php echo "".$total[0][0].""?>€</p>
	
			</body>
</html>



								
							
							
