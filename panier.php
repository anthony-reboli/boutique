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
								$id_utilisateurs=$_SESSION['id'];
								//$id = $_GET['id'];
    							$i=0;
            							foreach ($test->creationPanier($id_utilisateurs) as $values)
										{
								var_dump($test->creationPanier($id_utilisateurs));

						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<td>Votre panier est vide</td>";

						    	 }
						    	 
						        else {
						        	
						        	
						            $total = $values[13] * $values[2];
						            
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
									echo "<td>".$values[1]."</td>";
									echo "<td>".$values[3]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$values[5]."\"></td>";
									echo "<td>".$values[14]."</td>";
									echo "<td>".$values[2]."</td>";
									echo "<td>".$total."</td>";
									echo "</tr>";
									echo "</table>";
									echo "rentre";
									 include("quantite.php");
									
									$i += 1;
										}
									}
		  			
		  		
		  				
		  				
		  							
			?>



	</body>
</html>



								
							
							
