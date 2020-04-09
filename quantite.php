<?php
		$connexion = mysqli_connect("localhost","root","","boutique");
      	$id=$_SESSION['id'];
      	$id_commande=$values[0];
      	$id_produits=$values[2];
 	
		echo "blablabla";

		if (isset($_POST["supp$i"])) 
		{
			echo "blablabla";
			
				echo "cobras";
			
				$eff= ("DELETE FROM `commande` WHERE id=$id_commande AND  id_produit =$id_produits AND id_utilisateur=$id ");
					var_dump($eff);
				$query2=mysqli_query($connexion,$eff);
	
				var_dump($query2);
			
																  
				

		}
	
		?>
	<form method="post" >
	<button name="supp<?php echo $i ?>">Supprimer Article</button>
	</form>	
	<?php
	$i++;
	?>
																  

	
	
	




		
	

			




	

