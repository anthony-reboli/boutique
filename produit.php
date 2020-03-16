<?php
 include("bar-nav.php");
 

					session_start();
								$id=$_GET['id'];
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query( "SELECT *FROM produits INNER JOIN utilisateurs WHERE id_utilisateurs=$id");
								var_dump($reponse);
								$reponse2 = $connexion->query( "SELECT  nomproduit, prixproduit, description, image, souscategories, dateajout FROM produits WHERE id_utilisateurs=$id");
								$reponse2->fetch();
								$reponse2->execute();
								var_dump($reponse2);
								$i = 0;

								foreach ($reponse2 as list($nomproduit, $prixproduit, $description, $image, $souscategories, $date))
								 {
								 echo "<div>";
							
								    echo "<p>".$nomproduit."</p>";
								    echo "<p>".$prixproduit."</p>";
								    echo "<p>".$description."</p>";
								    echo "<img src=\"upload/".$image."\">";
								    echo "<p>".$souscategories."</p>";
								    echo "<p>".$date."</p>";


   
    							$i += 1;
    							echo "</div>";
    
							 }
								

								
							
									


?>
