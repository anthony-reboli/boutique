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
<input type="submit" name="catpage">
<br>


<select name="sc_b" id="categorie-select">
	<option value="">--sous categories--</option>
	<option value="sachet">sachets</option>
	<option value="boite">boites</option>
</select>
<input type="submit" name="catpage2">
</form>

<?php 
// categoerie
 if(isset($_POST['catpage']))
	{
	if($_POST['pagear'] == the)
		 {
		 header("location:boutique.php");
		 }
			elseif($_POST['pagear'] == thehiere)
			{
				header("location:boutique2.php"); 
			}
	}

	// sous categories
	 if(isset($_POST['catpage2']))
	{
	if($_POST['sc_b'] == 'sachet')
		 {
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
			elseif($_POST['sc-b'] == boite)
			{
				header("location:boutique2.php"); 
			}
	}

 // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::





	
	

		 $requete="SELECT * from produits where categories = 1";
	 $query=mysqli_query($bdd, $requete);
	 $reponse=mysqli_fetch_all($query);

?>



	<h1>Notre boutique</h1>



	<?php

// paginatation
	 $countproduit="SELECT COUNT(id) as nbArt from produits";
	 $querycount= mysqli_query($bdd,$countproduit);
	 $resultatcount= mysqli_fetch_assoc($querycount);



	 $nbArt= $resultatcount['nbArt'];
	 $perpage = 12;
	 $nbPage =ceil($nbArt/$perpage);
	 	 

	 	 if (isset($_GET['p']) && $_GET['p'] >0 && $_GET['p']<=$nbPage)
	 {
	 	$cpage = $_GET['p'];
	 }
	 else{

	 	$cpage= 1;
	 }

	 $requeteproduit="SELECT * FROM produits where categories=1 ORDER by dateajout DESC LIMIT ".(($cpage-1)*$perpage).",$perpage";
	 var_dump($requeteproduit);
	 $queryproduit= mysqli_query($bdd,$requeteproduit);
	 
	 // afiche les produit
	  while($data= mysqli_fetch_assoc($queryproduit))
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

	    for($i=1;$i<=$nbPage;$i++){
	    	echo "<a href=\"boutique.php?p=$i\">$i</a> /";
	    }
	    

	?>


	



	

</body>
</html>