<?php

		//$id=$_GET['id'];
      	$id_utilisateurs=$_SESSION['login'];
      	$connexion = mysqli_connect("localhost","root","","boutique");
      	//var_dump($connexion);
		//var_dump($test);
		var_dump($values);
		echo "blablabla";

		if (isset($_POST["plus$i"])) 
		{
			
			 if($values[13] += 0) //si il na pas fait de jaime
			
			{
				echo "cobras";
				$btplus = $_POST["plus$i"];
				$id_panier = $values[9];
				$prix_total= $total;
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit +1 WHERE panier.id = $id_panier");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				var_dump($query2);
				
			
			}
			else{
				echo"Veuillez choisir une quantité!";
			}
		}
		if (isset($_POST["moins$i"])) 
		{
			
			 if($values[13] += 0) //si il na pas fait de jaime
			
			{
				echo "cobras";
				$btmoins = $_POST["moins$i"];
				$id_panier = $values[9];
				$prix_total= $total;
				$update= ("UPDATE panier SET quantiteproduit = quantiteproduit -1 WHERE panier.id = $id_panier");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				var_dump($query2);
				
			
			}
			else{
				echo"veuillez choisir une quantité!";
			}
		}

									if (isset($_POST['supprimer'])){
									   
									     
									         supprimePanier();
									      
									   
									}

	
		?>
		<form method="post" action="panier.php">
	<button id="plus" name="plus<?php echo $i ?>">+</button><br />
	<button id="moins" name="moins<?php echo $i ?>">-</button><br />
	<button id="supp" name="supprimer">Suppimer panier</button><br />
	</form>	



		
	

			




	

