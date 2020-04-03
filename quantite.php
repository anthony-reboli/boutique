<?php
	
	

		
		
      	$id_utilisateurs=$_SESSION['id'];
      	$connexion = mysqli_connect("localhost","root","","boutique");
      
		echo "blablabla";

		if (isset($_POST["plus$i"])) 
		{
			
			 if($values[3] += 0) //si il na pas fait de jaime
			
			{
				echo "cobras";
				
				$btplus = $_POST["plus$i"];
				$id_panier = $values[0];
				var_dump($id_panier);
				$id_produits =  $values[2];
				$prix_total= $total;
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit +1 WHERE id = $id_panier AND id_produits= $id_produits AND id_utilisateurs= $id_utilisateurs");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				var_dump($query2);
				
			
			}
			else{
				echo"Veuillez choisir une quantité!";
			}
		}


		if (isset($_POST["moins[$i]"])) 
		{
			
			 if($values[3] += 0) //si il na pas fait de jaime
			
			{
				echo "cobras";
				$btmoins = $_POST["moins$i"];
				$id_panier = $values[0];
				$id_produits =  $values[2];
				$prix_total= $total;
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit -1 WHERE id = $id_panier AND id_produits= $id_produits AND id_utilisateurs= $id_utilisateurs");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				//var_dump($query2);
				
			
			}
			else{
				echo"veuillez choisir une quantité!";
			}
		}
	

	 
		?>
	<form method="post" action="panier.php?id=<?php echo $id?>">
	<button id="plus" name="plus<?php echo $i ?>">+</button><br />
	<button id="moins" name="moins<?php echo $i ?>">-</button><br />
	</form>	
	




		
	

			




	

