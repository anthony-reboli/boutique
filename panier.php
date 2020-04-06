<?php
session_start();
 include("bar-nav.php");
 include("classpanier.php");

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
								$test=new Panier();
								//var_dump($test);
								$id_utilisateurs=$_SESSION['id'];
								
								
	            				foreach ($test->creationPanier($id_utilisateurs) as $values)
								{
								echo "bonjour2";
								 //var_dump($test->creationPanier($id_utilisateurs));
								
								

						        		if (!empty($test->creationPanier($id_utilisateurs))) {
						        			
									        	//var_dump($values);
									      
									   			if(isset($_GET['id'])){
			 									echo "bonjour";

			 									//$req3= $connexion->query("SELECT count(id_produit) FROM panier WHERE panier.id_utilisateur =".$_SESSION['id']."");
			 									//$taux = $req3->fetchAll();
			 								
			 										
			 											//for ($j=0; $j <=$taux ; $j++) { 
			 											//var_dump($taux);
							 												$i=0;
													            $total = $values[5] * $values[7];
													   
																echo "<table width=250px>";
																echo "<tr>";
																echo "<th>Nom produit</th>";
																echo "<th>Description</th>";
																echo "<th>Image</th>";
																echo "<th>Date de la commande</th>";
																echo "<th>Prix</th>";
																echo "<th>Prix total</th>";
																echo "</tr>";
																echo "<tr>";
																echo "<td>".$values[0]."</td>";
																echo "<td>".$values[1]."</td>";
																echo "<td><img heigh=150px width=150px src=\"upload/".$values[2]."\"></td>";
																echo "<td>".$values[6]."</td>";
																echo "<td>".$values[7]."</td>";
																echo "<td>".$total."</td>";
																echo "</tr>";
																echo "</table>";
																
									
																	 include("quantite.php");
																	 $i++;
																	//}
																	
																
															}
											else
											{
											echo "Votre Panier est vide!!";
											}

										}
									}
									


							?>
	
			</body>
</html>



								
							
							
