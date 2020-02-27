 
<?php
session_start();
date_default_timezone_set('europe/paris');
  include("bar-nav.php");
 
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



				if (isset($_SESSION['login']) =='admin') {
					$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
					$id = $_SESSION['id'];
					$req = $connexion->query("SELECT * FROM produits WHERE id=$id ");
					var_dump($req);
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - Boutique </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<body>
<header>

</header>
		<section>
			<h1 class="titre">Nos Produits</h1>
						<?php								
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$reponse = $connexion->query( "SELECT *FROM produits INNER JOIN utilisateurs WHERE utilisateurs.id=produits.id");
								var_dump($reponse);
								$reponse2 = $connexion->query( "SELECT *FROM produits");
								$i=0;
								foreach ($reponse2 as list($id,$nomproduit,$prixproduit,$description,$user,$photo,$souscategories,$date)) {
								if (isset($_SESSION['login'])=='admin') {
								?>
									
									<p><?php echo $id?></p>
									<a href="admin.php"><?php echo $nomproduit?></a> 
									<p><?php echo $prixproduit?></p>
									<p><?php echo $description?></p>
									<p><?php echo $user?></p>
									<p><?php echo "<img src=\"upload/$photo\">"?></p>
									<p><?php echo $souscategories?></p>
									<p><?php echo $date?></p>
								
								<?php
								$i++;
									
								}
								
								}
									
								?>
								<?php

								if (isset($_POST['valider'])) {
									if (!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['description'])&& !empty($_POST['photo'])&& !empty($_POST['souscategories'])) {
													$titre = $_POST['titre'];
									                $prix = $_POST['prix'];
									                $description = $_POST['description'];
									                $photo = $_POST['photo'];
									                $souscategories = $_POST['souscategories'];
									                $id = $_SESSION['id'];
									                $date= date("Y-m-d H:i:s");
													$requete = $connexion->prepare("INSERT INTO produits (nomproduit, prixproduit, description, id_utilisateurs, image,souscategories,dateajout) VALUES ('$titre', '$prix', '$description', '$id', '$photo','$souscategories','".$date."')");
													var_dump($requete);
													$requete->execute();
													var_dump($connexion);
									}
								
								}
							  ?>
							  <form method="post">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre" required></br>
							                    <label>Prix</label></br>
							                    <input type="text" name="prix"></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                   	<label>Photo</label></br>							         
							                   	<input type="file" name="photo" required></br>
							                   	<label>Sous Catégories</label></br>
							                    <input type="text" name="souscategories" required></br>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							   </form>
							   	<?php

								if (isset($_POST['modifier'])) {
									if (!empty($_POST['titre3'])&& !empty($_POST['titre2'])&& !empty($_POST['description'])&& !empty($_POST['photo'])) {
													$titre3 = $_POST['titre3'];
													$titre2 =  $_POST['titre2'];
									                $prix2 = $_POST['prix2'];
									                $description = $_POST['description'];
									                $photo = $_POST['photo'];
									                $id = $_SESSION['id'];
									                $date= date("Y-m-d H:i:s");
									                $souscategories = $_POST['souscategories'];
													$requete2 = $connexion->prepare("UPDATE produits SET nomproduit= '$titre2', prixproduit= '$prix2',description= '$description', id_utilisateurs= '$id',image= '$photo',souscategories='$souscategories',dateajout='$date' WHERE nomproduit = '$titre3'");
													var_dump($requete2);
													$requete2->execute();
													var_dump($connexion);
									}
								
								}
							  ?>
							  	  <form method="post" class="ajout">
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
							                   	<label>Sous Catégories</label></br>
							                    <input type="text" name="souscategories" required></br>
							                    <input type="submit" value="modifier" name="modifier"></br>
							      </form>
							   <?php
							   if (isset($_POST['effacer'])) {
							   		if (!empty($_POST['titre4']))
											 			{
											 			$titre4 = $_POST['titre4']; 
										                $id = $_SESSION['id'];
									        			$requete3 = $connexion->prepare("DELETE FROM produits WHERE nomproduit = '$titre4'");
									        			var_dump($requete3);
									        			$requete3->execute();
									        			header('Location:admin.php');

									        			
												
		
				   										}

							   	
							   }
							   ?>
							    <form method="post" class="ajout">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre4" required></br>
							                    <input type="submit" value="effacer" name="effacer"></br>
							    </form>

						
</section>
</body>
</html>