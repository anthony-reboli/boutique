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
								//var_dump($test);
								$id_utilisateurs=$_SESSION['id'];
								if(isset($_GET['id'])){
 									echo "bonjour";
								
	            				foreach ($test->creationPanier($id_utilisateurs) as $values)
								{
								echo "bonjour2";
								//var_dump($test->creationPanier($id_utilisateurs));

						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<td>Votre panier est vide</td>";

						    	 }
						   
						        else {
						        	//var_dump($test);
						      
						   
						        	
						        	$i=0;   
						            $total = $values[3] * $values[8];
						         
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
									echo "<td>".$values[7]."</td>";
									echo "<td>".$values[9]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$values[10]."\"></td>";
									echo "<td>".$values[13]."</td>";
									echo "<td>".$values[8]."</td>";
									echo "<td>".$total."</td>";
									echo "</tr>";
									echo "</table>";
									
									
											 include("quantite.php");

										
									}

									}
									}


			?>
	
	</body>
</html>



								
							
							
