<?php
session_start();
 include("bar-nav.php");
 include("classpanier.php");
 	
?>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title></title>
</head>
<body>


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
						        	$value = $values++;
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
									echo "<td><form method=\"post\"><input type=\"submit\" name=\"plus\" value=\"+\"/>";
									echo "".$value[7]."";
									var_dump($value[7]);
									echo "<input type=\"submit\" name=\"moins\" value=\"-\"/></form></td>";
									echo "<td>".$total."</td>";
           							//echo "<input type=\"submit\" name=\"action\" value=\"refresh\"/>";
           							echo "</tr>";
									echo "<table>";

							}
							}
							  						
			?>

	</body>
</html>



								
							
							
