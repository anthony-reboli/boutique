<?php session_start();?>
<html>
<head>
	<title>Boutique</title>
	<link rel="stylesheet" href= "boutique.css">
</head>
<body>
	<header>
		<?php include("bar-nav.php");?>
	</header>
	<main>
		<?php
		$bdd= mysqli_connect("localhost","root","","boutique");
		?>
<!-- Choix de categorie -->
<label for="categorie-select">Choisir la categorie:</label>

<form name="form-bout"method="post" type="">
<select name="pagear" id="categorie-select">
	<option value="">--choisir une option--</option>
	<option value="the">the</option>
	<option value="thehiere">thehiere</option>
</select>

 				

				<?php if(isset($_POST['catpage'])){ ?>
					<select name="sc_b" id="categorie-select">
						<option value="">--sous categories--</option>
						<?php if($_POST['pagear'] == 'the'){ ?>
							<option value="sachet">sachets</option>
							<option value="boite">boites</option>
						<?php } ?>
						<?php if($_POST['pagear'] == 'thehiere'){?>
							<option value="noire">noire</option>
							<option value="blanc">blanc</option>
						<?php } ?>
					</select>
				<?php } ?>

<input type="submit" name="catpage">
<br>
</form>


<?php 
// categoerie
 if(isset($_POST['catpage']))
	{
		if($_POST['pagear'] == 'the' && $_POST['sc_b'] == "")
		{
			$requete3="SELECT * from produits where categories = '1'";
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


		 		 	elseif($_POST['sc_b'] == 'sachet') // sous categorie sachet active
		 	{
		 		echo" passe" ;
		 
		 // header("location:boutique.php");
	 $requete2="SELECT * from produits where categories = '1' and souscategories = 'sachet'";
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
		 elseif($_POST['sc_b'] == 'boite') // sous categorie boite active
		 	{
		 		echo" passe" ;
		 
		 // header("location:boutique.php");
	 $requete2="SELECT * from produits where categories = '1' and souscategories = 'boite'";
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
	// else{
	// 	include('boutique2.php');
	// }

 // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::





	
	

		 $requete="SELECT * from produits where categories = 1";
	 $query=mysqli_query($bdd, $requete);
	 $reponse=mysqli_fetch_all($query);

?>



	<h1>Notre boutique</h1>



	<?php


	    

	?>


	



	

</body>
</html>