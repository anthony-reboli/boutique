


<?php 
// categoerie
 if(isset($_POST['catpage']))
	{
		if($_POST['pagear'] == 'the' && $_POST['sc_b'] == "")
		{
			// header("location:boutique.php");
		}
		if($_POST['pagear'] == 'thehiere' && $_POST['sc_b'] == "")
		{
			$requete3="SELECT * from produits where categories = '2'";
	 $query3=mysqli_query($bdd, $requete3);
	 
	
	 
while($data= mysqli_fetch_assoc($query3))
	  {
	  		$i=0;
	  		$did=$data['id'];
	  		$img=$data['image'];
	  		$dnp=$data['nomproduit'];
	  		var_dump($data);
	  	echo"<section class=\"thep\">";
	  	echo" <div class=\"theb\">";
		// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
		echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
		echo "<img class=\"imagebout\" src=\"upload/$img\">";
		echo "<p>{$data['description']}</p>";
		echo "<p>{$data['prixproduit']}</p>";
		
		
		echo "<form method=\"post\" action=\"panier.php?id=$did\"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
		echo "</div>";
		echo"</section>";
		$i++;




		
		
		
	  }
		}


		 		 	elseif($_POST['sc_b'] == 'noire') // sous categorie noire active
		 	{
		 		echo" passe" ;
		 
		 // header("location:boutique.php");
	 $requete2="SELECT * from produits where categories = '2' and souscategories = 'noire'";
	 $query2=mysqli_query($bdd, $requete2);
	 
	
	 
				while($data= mysqli_fetch_assoc($query2))
	 	 {
	  		$i=0;
	  		$did=$data['id'];
	  		$img=$data['image'];
	  		$dnp=$data['nomproduit'];
	  		var_dump($data);
	  	echo"<section class=\"thep\">";
	  	echo" <div class=\"theb\">";
		// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
		echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
		echo "<img class=\"imagebout\" src=\"upload/$img\">";
		echo "<p>{$data['description']}</p>";
		echo "<p>{$data['prixproduit']}</p>";
		
		
		echo "<form method=\"post\" action=\"panier.php?id=$did\"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
		echo "</div>";
		echo"</section>";
		$i++;




		
		
		
	  }
		
	}


	elseif($_POST['sc_b'] == 'blanc') // sous categorie blanc active
		 	{
		 		echo" passe" ;
		 
		 // header("location:boutique.php");
	 $requete2="SELECT * from produits where categories = '2' and souscategories = 'blanc'";
	 $query2=mysqli_query($bdd, $requete2);
	 
	
	 
				while($data= mysqli_fetch_assoc($query2))
	 	 {
	  		$i=0;
	  		$did=$data['id'];
	  		$img=$data['image'];
	  		$dnp=$data['nomproduit'];
	  		var_dump($data);
	  	echo"<section class=\"thep\">";
	  	echo" <div class=\"theb\">";
		// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
		echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
		echo "<img class=\"imagebout\" src=\"upload/$img\">";
		echo "<p>{$data['description']}</p>";
		echo "<p>{$data['prixproduit']}</p>";
		
		
		echo "<form method=\"post\" action=\"panier.php?id=$did\"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
		echo "</div>";
		echo"</section>";
		$i++;




		
		
		
	  }
		
	}
}

 // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::





	
	

		 
?>









	



	

