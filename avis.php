
 <?php
  $connexion = mysqli_connect("localhost","root","","boutique");
  $requete = "SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $reqa = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($reqa);
    
  	?>
  		<h1>Poster votre avis sur cette article</h1>
  		<div>
  			<?php
  			$requete2a="SELECT image FROM produits WHERE id = '".$_GET['id']."'";
  			$query2a=mysqli_query($connexion,$requete2a);
  			$res2a=mysqli_fetch_assoc($query2a);
  			
  			$img=$res2a['image'];
  			echo "<img class=\"imageavis\" src=\"upload/$img\"></a>";
  			?>
  		</div>
		<form id="formbo"method="post">
			
			<label class="label1">Ecrire votre avis</label><br>

			<textarea id="story" name="avis"
          rows="7" cols="114" required></textarea>
		<input type="submit" name="send" value="valider">

		</form>

		<?php 
		 if (isset($_POST['send']))
		 {
		 	$req1a="INSERT into avis (id_utilisateur,id_produit,commentaires) VALUES ('".$data['id']."','".$_GET['id']."','".$_POST['avis']."')";

		 	$query1a= mysqli_query($connexion,$req1a);

		 }

		?>
