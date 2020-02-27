<?php session_start();?>
<html>
<head>
	<title>Boutique</title>
	<link rel="stylesheet" href= "boutique.css">
</head>
<body>
	<header>
		<?php include("bar-nav.php");?>

<!-- Choix de categorie -->
<label for="categorie-select">Choisir la categorie:</label>
<form name="form-bout"method="post" type="">
<select name="pagear" id="categorie-select">
	<option value="">--choisir une option--</option>
	<option value="the">the</option>
	<option value="thehiere">thehiere</option>
</select>
<input type="submit" name="catpage">
</form>

<?php 
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

 // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::





	
	$bdd= mysqli_connect("localhost","root","","boutique");

		 $requete="SELECT * from produits where souscategories = 1";
	 $query=mysqli_query($bdd, $requete);
	 $reponse=mysqli_fetch_all($query);

?>



	<h1>Notre boutique</h1>


<!-- Affiche les Article -->
	<?php
	// $i=0;
	// $photo=0;
	//  foreach ($reponse as $key => $value) {
			
	// echo"<section id=\"$photo\">";
	//  echo"<div class=\"photo\">";
	//  echo $reponse[$i][1];

	//  $photo= $reponse[$i][5];

	//  echo "<img class=\"imagebout\" src=\"upload/$photo\">";
	//  echo"<p>Description de lobjet en question</p>";
	//  echo $reponse[$i][2];
	//  echo "<button  class=\"$photo\"
	// 	type=\"button\"> panier</button>";
	//  $i++;
	//  $photo++;
	//  $photo= "photo[$i]";
	//  echo "</div>";
	//  echo "</section>";
	//  }






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

	 $requeteproduit="SELECT * FROM produits where souscategories=1 ORDER by dateajout DESC LIMIT ".(($cpage-1)*$perpage).",$perpage";
	 var_dump($requeteproduit);
	 $queryproduit= mysqli_query($bdd,$requeteproduit);
	 
	 // afiche les produit
	  while($data= mysqli_fetch_assoc($queryproduit))
	  {
	  		$i=0;
	  		$img=$data['image'];
	  	echo"<section class=\"thep\">";
	  	echo" <div class=\"theb\">";
		echo "<h1>{$data['nomproduit']}</h1>";
		echo "<img class=\"imagebout\" src=\"upload/$img\">";
		echo "<p>{$data['description']}</p>";
		echo "<p>{$data['prixproduit']}</p>";
		echo "<input type=\"submit\" name=\"boutiqueb[$i]\">";
		echo "</div>";
		echo"</section>";
		$i++;


		
		
		var_dump($data['image']);
	  }

	    for($i=1;$i<=$nbPage;$i++){
	    	echo "<a href=\"boutique.php?p=$i\">$i</a> /";
	    }
	    var_dump($data);
	?>


	



	

</body>
</html>