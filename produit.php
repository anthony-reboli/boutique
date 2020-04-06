<?php
session_start();

 			include("bar-nav.php");
 			$retour=$_GET['p'];


 								
								$id_utilisateurs=$_SESSION['id'];
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query("SELECT * FROM produits INNER JOIN  avis  INNER JOIN commande WHERE produits.id=$retour");
								$rep=$reponse->fetchAll();
							
      							//var_dump($rep);
      						
      							$id_produits= $rep[0][0];
      							$quantiteproduit = $rep[0][13];
      							$datepanier = $rep[0][8];
      							$prix_total = $rep[0][2];
      							$id_panier = $rep[0][9];
      							$id_commande=$rep[0][12];


      

      							if (isset($_GET['p'])) {
      								echo "coucou";
      							
								$i = 0;
								foreach ($rep as $val){
									var_dump($val);


									if (isset($val)) 
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
									echo "<td>".$val[1]."</td>";
									echo "<td>".$val[3]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$val[4]."\"></td>";
									echo "<td>".$val[7]."</td>";
									echo "<td>".$val[2]."</td>";
									echo "</tr>";
									echo "</table>";
									$i ++;
								}
								else{
						
									echo "Veuillez choisir un produit!";
    								}
    							}
    						
    					
    						
    					
    					
	
    					if (empty($_POST['ajout'])) {
    							echo "ca va";

    							
    							$requete=$connexion->query("SELECT * from commande WHERE id=$id_commande");
    							$rep2=$requete->fetchAll();
    							var_dump($rep2);
    							$connexion=mysqli_connect("localhost","root","","boutique");
    							$req="INSERT INTO panier(id_utilisateur,id_produit,quantiteproduit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits','$quantiteproduit',NOW(),'$prix_total')";
    							$query=mysqli_query($connexion,$req);

    						
    							var_dump($query);
    							//var_dump($requete2);
    							
    							//var_dump($requete);
							
							}
						}
							//var_dump($requete);
							$id_panier = $rep[0][9];
?>

 <form  method="post" action="panier.php?id=<?php echo $id_panier?>">
	<button name="ajout">Ajouter au panier</button>
</form>