<?php
	
	

		
		
      	$id_utilisateurs=$_SESSION['id'];
      	$connexion = mysqli_connect("localhost","root","","boutique");
      
		echo "blablabla";

		if (isset($_POST["plus$i"])) 
		{
			
			 if($values[5] += 0) 
			
			{
				echo "cobras";
				
				$btplus = $_POST["plus$i"];
				$id_produits=$values[9];
				
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit +1 WHERE  id_produit = $id_produits AND id_utilisateur= ".$_SESSION['id']."" );
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				//header("Location:quantite.php"); 
				var_dump($query2);
				
			
			}
			else{
				echo"Veuillez choisir une quantité!";
			}
		}


		if (isset($_POST["moins$i"])) 
		{
			
			 if($values[5] += 0) //si quantite 
			
			{
				echo "cobras";
				$btmoins = $_POST["moins$i"];
				$id_produits=$values[9];
				
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit -1  WHERE  id_produit=$id_produits AND id_utilisateur= ".$_SESSION['id']." ");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				//header("Location:quantite.php"); 
				var_dump($query2);
				
			
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
	
	
	




		
	

			




	

