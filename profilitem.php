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
		
		$idprod=$_GET['p'];

		
		$bdd= mysqli_connect("localhost","root","","boutique");


		if (isset($_GET['p']))
		{
		$requete="SELECT * FROM produits where id =\"$idprod\"";
		$query = mysqli_query($bdd,$requete);
		$resultat = mysqli_fetch_all($query);
		// $row=$resultat;
		var_dump($resultat);
		echo $resultat[0][1];



	
			

		}