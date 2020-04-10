<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="boutique.css">
    <title>avis d'article</title>
</head>
<body id="bodyav">
	<header>
  <?php
  session_start();
  $connexion = mysqli_connect("localhost","root","","boutique");
  $requete = "SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
    
  	
  	include("bar-nav.php");
  	?>
  </header>
  	<main id="mainavis">
  		<h1>Poster votre avis</h1>
  		<div>
  			<?php
  			$requete2="SELECT image FROM produits WHERE id = '".$_GET['id']."'";
  			$query2=mysqli_query($connexion,$requete2);
  			$res2=mysqli_fetch_assoc($query2);
  			
  			$img=$res2['image'];
  			echo "<img class=\"imageavis\" src=\"upload/$img\"></a>";
  			?>
  		</div>
		<form method="post">
			
			<label>Ecrire votre avis</label><br>

			<textarea id="story" name="avis"
          rows="7" cols="230" required></textarea>
		<input type="submit" name="send" value="valider">

		</form>

		<?php 
		 if (isset($_POST['send']))
		 {
		 	$req1="INSERT into avis (id_utilisateur,id_produit,commentaires) VALUES ('".$data['id']."','".$_GET['id']."','".$_POST['avis']."')";

		 	$query1= mysqli_query($connexion,$req1);

		 }

		?>
  	</main>
</body>