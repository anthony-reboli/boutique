<?php
session_start();

 			include("bar-nav.php");
 			$retour=$_GET['p'];


 								
								$id_utilisateurs=$_SESSION['id'];
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query("SELECT * FROM produits INNER JOIN  avis INNER JOIN panier WHERE produits.id=$retour");
								$rep=$reponse->fetchAll();
								//$rep= $connexion->query("SELECT * FROM produits INNER JOIN panier ");
      							//$tab = $rep->fetchAll();
      							var_dump($rep);
      						
      							$id_produits= $rep[0][0];
      							$quantiteproduit = $rep[0][13];
      							$datepanier = $rep[0][8];
      							$prix_total = $rep[0][2];
      							$id_panier = $rep[0][9];


      							//$connexion2=mysqli_connect("localhost","root","","boutique");
      							//$reponse2=("SELECT id FROM panier WHERE id_utilisateurs=$id_utilisateurs");
      							//$query2=mysqli_query($connexion2,$reponse2);
      							//$rep2=mysqli_fetch_all($query2);
      							//var_dump($rep2);





      							if (isset($_GET['p'])) {
      							
								$i = 0;
								foreach ($reponse as $values){


									if (!empty($values)) 
								{
									echo "<table width=250px>";
									echo "<tr>";
									echo "<th>Nom produit</th>";
									echo "<th>Description</th>";
									echo "<th>Image</th>";
									echo "<th>Date de la commande</th>";
									echo "<th>Prix</th>";
									echo "</tr>";
									echo "<tr>";
									echo "<td>".$values[1]."</td>";
									echo "<td>".$values[3]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$values[5]."\"></td>";
									echo "<td>".$values[8]."</td>";
									echo "<td>".$values[2]."</td>";
									echo "</tr>";
									echo "</table>";
									$i ++;
								}
								else{
						
									echo "Veuillez choisir un produit!";
    								}
    							}
    						}
    					
    						
    					
    					
	
    					if (isset($_POST['ajout'])) {
    							$connexion2=mysqli_connect("localhost","root","","boutique");
    							$requete=("INSERT INTO panier (id_utilisateurs,id_produits,quantiteproduit,prix_total) VALUES ('$id_utilisateurs','$id_produits',1,'$prix_total')");
    							$query=mysqli_query($connexion2,$requete);
    							
    							var_dump($requete);
							
							}
							//var_dump($requete);
							$id_panier = $rep[0][13];
?>

 <form  method="post" action="panier.php?id=<?php echo $id_panier?>">
	<button name="ajout">Ajouter au panier</button>
</form>