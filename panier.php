
<?php
		 session_start();
		 include("bar-nav.php");
		 include("classpanier.php");
 	
?>	
 			<h1>Votre panier</h1>
  				<?php
 						
								$test=new Panier();
								$id_utilisateurs=$_SESSION['login'];
    							$j=0;
            					foreach ($test->creationPanier($id_utilisateurs) as $values)
								{
								// var_dump($test->creationPanier($id_utilisateurs));

						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<tr><td>Votre panier est vide </tr>";
						    	 } 
						        else {
						            $total = $values[7] * $values[1];
									echo "<table width=200px>";
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
									echo "<td>".$values[7]."</td>";
									echo "<td>".$total."</td>";
									echo "</tr>";
									echo "<tr><td colspan=\"2\"> </td>";
            						echo "<td colspan=\"2\">";
            						echo "</td></tr>";
           							echo "<tr><td colspan=\"4\">";
           							echo "<input type=\"submit\" value=\"Rafraichir\"/>";
           							echo "<input type=\"hidden\" name=\"action\" value=\"verrou\"/>";					
									echo "<table>";
    							$j +=1;
  
    								}
    							
    						
    				}
    					
?>




								
							
							
