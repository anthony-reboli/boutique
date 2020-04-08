
<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" type="text/css" href="">
		<meta charset="utf-8">
	</head>
			<body>
				<header>
				<?php	include("bar-nav.php");?>
				</header>
			<main>

 			

								<?php
 								$retour=$_GET['p'];
								$id_utilisateurs=$_SESSION['id'];
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query("SELECT * FROM produits  INNER JOIN  avis   on produits.id=$retour  where id_utilisateur=$id_utilisateurs");
								$rep=$reponse->fetchAll();
							
      							var_dump($rep);


      							
      						
      												if (!empty($_GET['p'])) {


      														echo "coucou";

      								
      							
								$i = 0;
									foreach ($rep as $val)
								{
									//var_dump($val);


										if (!empty($val)) 
									{
										echo "<table width=250px>";
										echo "<tr>";
										echo "<th>Nom produit</th>";
										echo "<th>Description</th>";
										echo "<th>Image</th>";
						
										echo "<th>Prix</th>";
										echo "</tr>";
										echo "<tr>";
										echo "<td>".$val[1]."</td>";
										echo "<td>".$val[3]."</td>";
										echo "<td><img heigh=150px width=150px src=\"upload/".$val[4]."\"></td>";
								
										echo "<td>".$val[2]."</td>";
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

									
    										if (empty($_POST['quantiteproduit'])) {

    												echo "veuillez enter une quantité à ajouter au panier";
    												?>
    												<form method="post">
    												<input type="number" name="quantiteproduit" min="1" max="10"/><br>
    												<input type="submit" name="valider2" value="valider">

    												</form>
    												<?php

    																				}
    										else{
    											$connexion=mysqli_connect("localhost","root","","boutique");
    											$retour=$_GET['p'];
    											$qtt=$_POST['quantiteproduit'];
    											$quantiteproduit=$val[2];
    											$prixglobal=$qtt*$quantiteproduit;
    											$req2="INSERT INTO commande (id_utilisateur,id_produit,prixproduit,quantiteproduit,prixglobal,dateajout) VALUES ('$id_utilisateurs','$retour','$quantiteproduit','$qtt','$prixglobal',NOW()) ";

    											$query2=mysqli_query($connexion,$req2);
    											var_dump($req2);
 														var_dump($qtt);
 														echo "bonjour";
 														

    											?>

    						
								<?php
								
    											}
    							
							?>
						
					</main>
			</body>
</html>
