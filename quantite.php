<?php

		$id=$_GET['id'];
      	$id_utilisateurs=$_SESSION['login'];
      	$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      	$reponse = $connexion->query( "SELECT nomproduit,prixproduit,description,image,categories,souscategories,dateajout,quantiteproduit,prix_total FROM produits INNER JOIN panier WHERE produits.id_utilisateurs='$id'");
                
                $test=$reponse->fetchAll();

            return $test;
          }
				

				foreach ($test->creationPanier($id_utilisateurs) as $values)
										
		{

		if (isset($_POST["plus$i"])) 
		{
			
			 if(empty($test->creationPanier($id_utilisateurs)))  //si il na pas fait de jaime
			
			{
				$btplus = $_POST["plus$i"];
				$plus = $values[2];
				$moins= $values[3];
				$update= "INSERT INTO panier (id_utilisateurs,plus,moin,id_produits,datepanier,prix_total) VALUES ($id_utilisateurs,1,0,$id_produits,$datepanier,$prix_total)";
				$query2=mysqli_query($connexion,$update);
			
			}
			elseif ( !empty($test) && $test[3] == -1 ) {
				$btplus = $_POST["plus$i"];
				$plus = $values[2];
				$moins= $values[3];
				// var_dump($aime);
				$updatepas= "UPDATE panier SET plus = 1 WHERE produit.id_utilisateurs=$id";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			}
		else{
				$plus = $values[2];
				$moins= $values[3];
				$updatepas2= "DELETE FROM panier WHERE produit.id_utilisateurs=$id";
				$query3=mysqli_query($connexion,$updatepas2);
			
		
			}

		}
	
		// si il a fait un jaime pas
		if (isset($_POST["moins$i"])) 
		{
			//si il na pas fait de jaime pas
			 if(empty($resultat))
			{
				$btmoins = $_POST["moins$i"];
				$plus = $test[2];
				$moins= $test[3];
				// var_dump($aime);
				$updatepas= "INSERT INTO panier ( id_utilisateurs,plus,moins,id_produits,datepanier,prix_total) VALUES ($id_utilisateurs,-1, 0,$id_produits,datepanier,prix_total)";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			
			}
			elseif ( !empty($resultat) && $resultat[3] == 1 ) {
				$btmoins = $_POST["jaimepas$i"];
				$plus = $test[2];
				$moins= $test[3];
				// var_dump($aime);
				$updatepas= "UPDATE panier SET aime = -1 WHERE produit.id_utilisateurs=$id";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			}
		else
			{

				$plus = $test[2];
				$moins= $test[3];
				$updatepas2= "DELETE FROM panier WHERE produit.id_utilisateurs=$id";
				$querypas2=mysqli_query($connexion,$updatepas2);
				// var_dump($querypas2);
				
			}	
		}


					 $count="SELECT COUNT(*) FROM panier WHERE produit.id_utilisateurs=$id AND  plus = 1";
					 $countquery=mysqli_query($connexion,$count);
					 $resultataime= mysqli_fetch_all($countquery);
					 // var_dump($resultataime);

					 $count2="SELECT COUNT(*) FROM panier WHERE produit.id_utilisateurs=$id AND plus = -1" ;
					 //echo $count2;
					 $countquery2=mysqli_query($connexion,$count2);
					 $resultataime2= mysqli_fetch_all($countquery2);
					  // var_dump($resultataime2);


}		
?>
	<label><?php echo $resultataime[0][0] ?></label>
	<button id="plus" name="plus<?php echo $i ?>"></button><br />
	<label><?php echo $resultataime2[0][0] ?></label>
	<button id="moins" name="moins<?php echo $i ?>"></button><br />
					
?>



	

