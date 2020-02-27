<?php
session_start();
	$connexion =  mysqli_connect("localhost","root","","boutique");
if (isset($_SESSION['login'])=='admin') {
	
	$id = $_SESSION['id'];
	$req="SELECT nomproduit FROM `produits` WHERE id=$id ";
	$query=mysqli_query($connexion,$req);
	var_dump($query);
	header('Location:admin.php')

    else{
        header('Location:index.php')
}
}
?>
<link rel="stylesheet" type="text/css" href="boutique.css">
<h1>Bienvenue,<?php echo $_SESSION['login'];?></h1>
<a href="?ajouterarticle">Ajoutez un produit</a>