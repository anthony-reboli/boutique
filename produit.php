<?php
 include("bar-nav.php");
 

					session_start();

								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query( "SELECT *FROM produits INNER JOIN utilisateurs WHERE utilisateurs.id=produits.id");
								var_dump($reponse);
								$iduser = $_SESSION["id"];
								$reponse2 = $connexion->query( "SELECT  nomproduit, prixproduit, description, image, souscategories, dateajout FROM produits WHERE id_utilisateurs=$iduser");
								$reponse2->fetch();
								$reponse2->execute();
								var_dump($reponse2);
								$i = 0;

								foreach ($reponse2 as list($nomproduit, $prixproduit, $description, $image, $souscategories, $date))
								 {
								 echo "<div>";
							
								    echo "<p>".$nomproduit."</p>";
								    ?>
								   
								    <?php
								    echo "<p>".$prixproduit."</p>";
								    echo "<p>".$description."</p>";
								    echo "<img src=\"upload/".$image."\">";
								    echo "<p>".$souscategories."</p>";
								    echo "<p>".$date."</p>";


   
    							$i += 1;
    							echo "</div>";
    
							 }
								

								
							
									


?>
<form>
<input method= get type="button" name="ajout">Ajoutez au panier
</form>