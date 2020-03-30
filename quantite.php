<?php

		//$id=$_GET['id'];
      	$id_utilisateurs=$_SESSION['login'];
      	$connexion = mysqli_connect("localhost","root","","boutique");
      	//var_dump($connexion);
		var_dump($test);
		var_dump($values);
		echo "blablabla";

		if (isset($_POST["plus$i"])) 
		{
			
			 if($values[13] == 1 ) //si il na pas fait de jaime
			
			{
				echo "cobras";
				$btplus = $_POST["plus$i"];
				$plus = $values[13];
			
				$prix_total= $total;
				$update= ("UPDATE panier SET quantiteproduit = 1 WHERE produits.id_utilisateurs = $id_utilisateurs AND produits.id_panier = $id_utilisateurs AND panier.id = $id_utilisateurs");
					var_dump($update);
				$query2=mysqli_query($connexion,$update);
				
			
			}
			else{
				echo" ta greg";
			}
		}
		?>
		<form method="post" action="panier.php">
	<button id="plus" name="plus<?php echo $i ?>"></button><br />
	<label><?php echo $values[13] ?></label>
	</form>	



		
	

			




	

