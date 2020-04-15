 
<?php
session_start();
if (isset($_SESSION['login']) == "admin")
{
date_default_timezone_set('europe/paris');

    	if (isset($_SESSION['login'])==false)
    	{
       echo "<h3>Connectez vous et achetez maintenant";
    	}
    	elseif(isset($_SESSION['login'])==true)

    	{
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez achetez.</b></h3>"; 
       }
    	}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - Boutique </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<body id="pageadmin">
<header>
<?php
include("bar-nav.php");?>
</header>
<h1 class="titre">Nos Produits</h1>
		<section id="formadmin">
						<div class="form">
						<?php	
							
								
								if (isset($_POST['valider'])) {

									if (!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['description'])&& !empty($_POST['photo'])&& !empty($_POST['souscategories'])) {
													$titre = $_POST['titre'];
									                $prix = $_POST['prix'];
									                $description = $_POST['description'];
									                $photo = $_POST['photo'];
									                $categories = $_POST['categories'];
									                $souscategories = $_POST['souscategories'];
									                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
													$requete = $connexion->prepare("INSERT INTO produits (nomproduit, prixproduit, description, image,categories,souscategories) VALUES ('$titre', '$prix', '$description','$photo','$categories','$souscategories')");
													$requete->execute();
													var_dump($requete);
												
															//var_dump($connexion);
									}
								
								}
							  ?>
							  <p class="titre">Creer des Articles</p>
							  <form method="post" >
							                    <label>Titre</label></br>
							                    <input type="text" name="titre" required></br>
							                    <label>Prix</label></br>
							                    <input type="text" name="prix"></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                   	<label>Photo</label></br>							    
							                   	<input type="file" name="photo" required></br>
							                   	<label>Catégories</label></br>
							                    <input type="text" name="categories" required></br>
							                   	<label>Sous Catégories</label></br>
							                    <input type="text" name="souscategories" required></br>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							   </form>
							</div>

							<div class="form">
							   	<?php

								if (isset($_POST['modifier'])) {
									echo "string";
									if (!empty($_POST['titre3']) && !empty($_POST['titre2']) && !empty($_POST['description']) && !empty($_POST['photo']) && !empty($_POST['categories']) && !empty($_POST['souscategories'])) {
										echo "connexion";
													$titre3 = $_POST['titre3'];
													$titre2 =  $_POST['titre2'];
									                $prix2 = $_POST['prix2'];
									                $description = $_POST['description'];
									                $photo = $_POST['photo'];
									                $id = $_SESSION['id'];
									                $categories = $_POST['categories'];
									                $souscategories = $_POST['souscategories'];
													$requete2 = $connexion->prepare("UPDATE produits SET nomproduit= '$titre2', prixproduit= '$prix2', description= '$description' ,image = '$photo' ,categories = '$categories' ,souscategories ='$souscategories' WHERE nomproduit = '$titre3'");
													//var_dump($requete2);
													$requete2->execute();
													var_dump($requete2);
									}
								
								}
							  ?>
							   <p class="titre">Modifier des Articles</p>
							  	  <form method="post">
								  				<label>Recherche Articles</label></br>
							                    <input type="text" name="titre3" required></br>
							                    <label>Modifier Articles</label></br>
							                    <input type="text" name="titre2" required></br>
							                    <label>Prix</label></br>
							                    <input type="text" name="prix2"></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <label>Photo</label></br>							                    
							                   	<input type="file" name="photo" required></br>
							                   	<label>Catégories</label></br>
							                    <input type="text" name="categories" required></br>
							                   	<label>Sous Catégories</label></br>
							                    <input type="text" name="souscategories" required></br>
							                    <input type="submit" value="modifier" name="modifier"></br>
							      </form>
							   </div>
							   <div class="form">
							   <?php

							   if (isset($_POST['effacer'])) {
							   		if (!empty($_POST['titre4']))
											 			{
											 			$titre4 = $_POST['titre4']; 
										                $id = $_SESSION['id'];
									        			$requete3 = $connexion->prepare("DELETE FROM produits WHERE nomproduit = '$titre4'");
									        			var_dump($requete3);
									        			$requete3->execute();
									        			

				   										}						   	
							  					}	
		
							   ?>
							    <p class="titre">Effacer des Articles</p>
							    				<form method="post">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre4" required></br>
							                    <input type="submit" value="effacer" name="effacer"></br>
							    				</form>
							    </div>



						
</section>
</body>
</html>

<?php 
}
else{
	header("location:connexion.php");
}
?>