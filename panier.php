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
								$id = $_GET['id'];
    							
            							foreach ($test->creationPanier($id_utilisateurs) as $values)
										{
								//var_dump($test->creationPanier($id_utilisateurs));

						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<td>Votre panier est vide</td>";
						    	 }
						    	 
						        else {
						        	$i=0;
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
									echo "<td>".$total."</td>";
									echo "</tr>";
									echo "<table>";
									$i += 1;
										}
									}

				
					$connexion = mysqli_connect("localhost","root","","boutique");
					//var_dump($connexion);
					$count="SELECT COUNT(*) FROM panier WHERE id_produits=$id AND quantiteproduit = 1";
				 	$countquery=mysqli_query($connexion,$count);
				 	$resultatplus= mysqli_fetch_all($countquery);
				 	//echo $resultatplus;
				 	var_dump($resultatplus);

				 	$connexion2 = mysqli_connect("localhost","root","","boutique");	
				 	$count2="SELECT COUNT(*) FROM panier WHERE id_produits=$id AND quantiteproduit = -1" ;

				 	$countquery2=mysqli_query($connexion2,$count2);
				 	//var_dump($countquery2);
				 	$resultatmoins= mysqli_fetch_all($countquery2);	
				 	?>

				 	<form method='POST' action="panier.php?id=<?php echo $id; ?>">
					<label><?php echo $resultatplus[0][0] ?></label>
					<button  name="plus<?php echo $i ?>"></button><br />
					<label><?php echo $resultatmoins[0][0] ?></label>
					<button  name="moins<?php  echo $i ?>"></button><br />
					</form>

					<?php

						if (isset($_POST['plus']))
					  {

					    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
					    $rep = $connexion->query('UPDATE panier SET quantiteproduit = 1 WHERE  id_produits=id_utilisateurs');
					  }
					    if (isset($_POST['moins']))
					  {
					  	$_POST['moins'] = addslashes($_POST['moins']);
					    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
					    $rep2 = $connexion->query('UPDATE panier SET quantiteproduit = -1 WHERE id_produits=id_utilisateurs');
					  }

							  						
			?>

	</body>
</html>



								
							
							
