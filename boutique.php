<?php session_start();
	var_dump($_POST);
?>
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
		<!-- recherche -->
				<form name="recherche" method="get">
					<label>RECHERCHER PAR NOM</label>
					<br>
					<input type="search"  name="bs" aria-label="rechercher par titre">
					<input type="submit" name="recheb"/>
					<br>
					<label for="categorie-select">Choisir la categorie:</label>
				</form>
			<?php

				  				if (isset($_GET['recheb']))
				  				{
		  							$bs=$_GET['bs'];

  									echo "reste";
  					  				$rechercheb= "SELECT * FROM produits WHERE nomproduit LIKE '$bs'";
									$recherchebq= mysqli_query($bdd,$rechercheb);
									$resultatb= mysqli_fetch_all($recherchebq);
									
  				


								if (!empty($bs) and !empty($bs) == (isset($resultatb[0][1])))
								{
									echo "true";

							foreach($resultatb as $data6)
								{
	  
						  		$j=0;

						  		$did=$data6[0];
						  		$img=$data6[5];
						  		$dnp=$data6[1];
	 
							  	echo"<section class=\"thep\">";
							  	echo" <div class=\"theb\">";
								// echo "<h1>{<a href =\"panier.php?id=$did\">$data['nomproduit']}</h1></a>";
								echo "<a href=\"profilitem.php?p=$did\">$dnp</a> /";
								echo "<img class=\"imagebout\" src=\"upload/$img\">";
								echo "<p>{$data6[3]}</p>";
								echo "<p>{$data6[2]}</p>";
								echo "</div>";
								echo"</section>";
								$j++;

						// echo $resultatb[0][1];
						// echo $resultatb[0][2];
						// echo $resultatb[0][3];
						// echo $resultatb[0][4];
					
								}
							}

								else {
									echo "VOTRE RECHERCHE N'EST PAS ACCESSIBLE";
								}
							}
								?>

<!-- Choix de categorie -->

								<form name="form-bout"method="post" type="">
								<select name="pagear" id="categorie-select">
								<option value="">--choisir une option--</option>
								<option value="the">the</option>
								<option value="thehiere">thehiere</option>
								</select>

						<?php
								$requete4="SELECT * from produits where categories = '1'";
								$query4=mysqli_query($bdd, $requete4);

						 if(isset($_POST['catpage'])){ ?>
								<select name="sc_b" id="categorie-select">
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

							<h1>Notre boutique</h1>
							<?php 
// categoerie

				 		if(isset($_POST['catpage']))
						{

							if ($_POST['pagear'] == 'the' and empty($_POST['sc_b']))
							{
									$requete3="SELECT * from produits where categories = '1'";
							 		$query3=mysqli_query($bdd, $requete3);
							 		echo "theee";
			
	 
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


		 		 				if ($_POST['pagear'] == 'the' && $_POST['sc_b'] == 'sachet')  // sous categorie sachet active
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
										 		elseif ($_POST['pagear'] == 'the' && $_POST['sc_b'] == 'boite')  // sous categorie boite active
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
		
		 

									 if ($_POST['pagear'] == 'thehiere'and  empty($_POST['sc_b']))
									{
										$requete3="SELECT * from produits where categories = '2'";
								 		$query3=mysqli_query($bdd, $requete3);
								 		echo "thehierree";
	
	 
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


									 		 	elseif($_POST['pagear'] == 'thehiere' && $_POST['sc_b'] == "blanc") // sous categorie sachet active
												{
											 		echo" passe blanc" ;
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
													 elseif ($_POST['pagear'] == 'thehiere' && $_POST['sc_b'] == 'noire')  // sous categorie noire active
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
																	
									else {

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