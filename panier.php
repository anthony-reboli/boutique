
<?php
		 session_start();
		 include("bar-nav.php");
		 include("classpanier.php");
 	
?>	
 			<h1>Votre panier</h1>
  				<?php
 					
								$test=new Panier();
								$id_utilisateurs=$_SESSION['login'];
								$id=$_GET['id'];
    							
            							foreach ($test->creationPanier($id_utilisateurs) as $values)
										{
								//var_dump($test->creationPanier($id_utilisateurs));

						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<td>Votre panier est vide</td>";
						    	 }
						    	 
						        else {
						   			
						   			//$qts=$values[] * $values[];
						            $total = $values[7] * $values[1];
						           
									echo "<table width=250px>";
									echo "<tr>";
									echo "<th>Nom produit</th>";
									echo "<th>Prix</th>";
									echo "<th>Description</th>";
									echo "<th>Image</th>";
									echo "<th>Catégories</th>";
									echo "<th>Sous Catégories</th>";
									echo "<th>Date de la commande</th>";
									echo "<th>Quantité du produits</th>";
									echo "<th>Prix total</th>";
									echo "</tr>";
									echo "<tr>";
									echo "<td>".$values[0]."</td>";
									echo "<td>".$values[1]."</td>";
									echo "<td>".$values[2]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$values[3]."\"></td>";
									echo "<td>".$values[4]."</td>";
									echo "<td>".$values[5]."</td>";
									echo "<td>".$values[6]."</td>";
									echo "<td><input method=\"post\"type=\"submit\" value=\"+\"/></td>";
									echo "<td>".$qts."</td>";
									echo "<td><input method=\"post\"type=\"submit\" value=\"-\"/></td>";
									echo "<td>".$total."</td>";
           							echo "<input type=\"hidden\" name=\"action\" value=\"verrou\"/>";
           								echo "</tr>";
									echo "<table>";
								}
							}
    							
    							
    						
?>







								
							
							
