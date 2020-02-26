<?php session_start();?>
<html>
<head>
	<title>Boutique</title>
	<link rel="stylesheet" href= "boutique.css">
</head>
<body>
	<h1>Les Produit recents</h1>



	<?php
	$bdd= mysqli_connect("localhost","root","","boutique");

		 $requete="SELECT * from produits";
	 $query=mysqli_query($bdd, $requete);
	 $reponse=mysqli_fetch_all($query);
	 var_dump($reponse);

?>



	<h1>Notre boutique</h1>


<!-- Affiche les Article -->
	<?php
	$i=0;
	$photo=0;
	 foreach ($reponse as $key => $value) {
	echo"<section id=\"$photo\">";
	 echo"<div class=\"photo\">";
	 echo $reponse[$i][1];

	 $photo= $reponse[$i][5];

	 echo "<img class=\"imagebout\" src=\"upload/$photo\">";
	 echo"<p>Description de lobjet en question</p>";
	 echo $reponse[$i][3];
	 echo "<button  class=\"$photo\"
        type=\"button\"> panier</button>";
	 $i++;
	 $photo++;
	 $photo= "photo[$i]";
	 echo "</div>";
	 echo "</section>";
	 }



	?>


	



	

</body>
</html>