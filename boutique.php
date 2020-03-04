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
			<select name="formbou">
				<option value="sachet">sachets</option>
				<option value="boite">boites</option>
				<option value="noire">noire</option>
				<option value="blanc">blanc</option>

			</select>
			<input type="submit" name="catpage">
			<br>
		</form>



		<?php


		$requete4="SELECT * from produits where categories = '1'";
		$query4=mysqli_query($bdd, $requete4);



		?>







		<h1>Notre boutique</h1>
		<?php 
// categoerie








		if(isset($_POST['catpage']))
		{
			echo "qqqq";
			echo $_POST['formbou'];
 		 	if($_POST['formbou'] == 'sachet') // sous categorie sachet active
 		 	{
 		 		echo" passe alalala" ;

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
		 	elseif ($_POST['formbou'] == 'boite') // sous categorie boite active
		 	{
		 		echo" passe boite" ;

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
			elseif($_POST['formbou'] == "blanc") // sous categorie blanc active
			{
				echo " passe blanc" ;
			 	// header("location:boutique.php");
				$requete2="SELECT * from produits where categories = '2' and souscategories = 'blanc'";
				$query2=mysqli_query($bdd, $requete2);
				while($data2= mysqli_fetch_assoc($query2))
				{
					$i=0;
					$did=$data2['id'];
					$img=$data2['image'];
					$dnp=$data2['nomproduit'];
					var_dump($data2);
					echo"<section class=\"thep\">";
					echo" <div class=\"theb\">";
					// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
					echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
					echo "<img class=\"imagebout\" src=\"upload/$img\">";
					echo "<p>{$data2['description']}</p>";
					echo "<p>{$data2['prixproduit']}</p>";
					
					
					echo "<form method=\"post\" action=\"panier.php?id=$did\"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
					echo "</div>";
					echo"</section>";
					$i++;
				}
			}
			elseif ($_POST['formbou'] == "noire") // sous categorie noire active
			{
				echo" passe noire" ;
				// header("location:boutique.php");
				$requete2="SELECT * from produits where categories = '2' and souscategories = 'noire'";
				$query2=mysqli_query($bdd, $requete2);
				while($data2= mysqli_fetch_assoc($query2))
				{
					$i=0;
					$did=$data2['id'];
					$img=$data2['image'];
					$dnp=$data2['nomproduit'];
					var_dump($data2);
					echo"<section class=\"thep\">";
					echo" <div class=\"theb\">";
					// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
					echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
					echo "<img class=\"imagebout\" src=\"upload/$img\">";
					echo "<p>{$data2['description']}</p>";
					echo "<p>{$data2['prixproduit']}</p>";
					
					
					echo "<form method=\"post\" action=\"panier.php?id=$did\"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
					echo "</div>";
					echo"</section>";
					$i++;
				}
			}
		}
		else
		{

			$requeteb="SELECT * from produits ";
			$queryb=mysqli_query($bdd, $requeteb);
			echo "acrako2";
			while($data= mysqli_fetch_assoc($queryb))
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

	
	// else{
	// 	include('boutique2.php');
	// }

 // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::








		$requete="SELECT * from produits where categories = 2";
		$query=mysqli_query($bdd, $requete);
		$reponse=mysqli_fetch_all($query);

		?>







		<?php




		?>








	</body>
	</html>