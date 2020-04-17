<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" type="text/css" href="boutique.css">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
				<header>
				<?php	include("bar-nav.php");?>
				</header>
							
		
						<section>
								<H1 class="titre">Ma Selection</H1>
								<?php
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$retour=$_GET['p'];
								$id_utilisateurs=$_SESSION['id'];
								$reponse = $connexion->query("SELECT * FROM produits WHERE produits.id=$retour ");
								$rep=$reponse->fetchAll();
						
      										if (!empty($_GET['p'])) 
      										{
													$i = 0;
														foreach ($rep as $val)
													{
															if (!empty($val)) 
														{
															echo "<div id='contenueproduit' >";
															echo "<table id='contenue2'>";
															echo "<tr>";
															echo "<th class='nomp'>Nom</th>";
															echo "<th class='nomp'>Description</th>";
															echo "<th class='nomp'>Image</th>";
															echo "<th class='nomp'>Prix</th>";
															echo "</tr>";
															echo "<tr>";
															echo "<td class='nomp'>".$val[1]."</td>";
															echo "<td class='nomp'>".$val[3]."</td>";
															echo "<td id='resultnom'><img class='photo' heigh=400px width=400px src=\"upload/".$val[4]."\"></td>";
															echo "<td class='nomp'>".$val[2]."€</td>";
															echo "</tr>";
															echo "</table>";
															$i ++;
														}
															else
														{
															echo "Veuillez choisir un produit!";
					    								}

					    							}
								    		}
								    		?>
								    
								    			<H2 class="titre">Entrer une quantite</H2>
								    		<?php
    										if (empty($_POST['quantiteproduit'])) 
    											{
	    									?>
	    									<form class="titre" method="post" >
	    									<input id="quantiteproduit" type="number" name="quantiteproduit" min="1" max="10"/><br>
	    							
	    									<button id="btvalprod" name="valider2" value="valider"><img id="imgbtval" height="65" width="65" src="upload/ajout.png"></button>
	    									</form>
	    									</div>

	    									<?php
	    									
    											}
    										else
    										{
    											$connexion=mysqli_connect("localhost","root","","boutique");
    											$retour=$_GET['p'];
    											$qtt=$_POST['quantiteproduit'];
    											$quantiteproduit=$val[2];
    											$prixglobal=$qtt*$quantiteproduit;
    											$req2="INSERT INTO commande (id_utilisateur,id_produit,prixproduit,quantiteproduit,prixglobal,dateajout) VALUES ('$id_utilisateurs','$retour','$quantiteproduit','$qtt','$prixglobal',NOW()) ";
    											$query2=mysqli_query($connexion,$req2);
    											header("location:panier.php");
    										}
    											?>
    									
    										<div id="contavis">
    										<H2 class="titre">Les Avis sur ce produit</H2>
											<?php
    										
    											$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
												$retour=$_GET['p'];
												$id_utilisateurs=$_SESSION['login'];
												//var_dump($id_utilisateurs);
												$reponse2 = $connexion->query("SELECT utilisateurs.login,commentaires,dateavis FROM avis INNER JOIN utilisateurs on id_utilisateur=utilisateurs.id WHERE id_produit=$retour ORDER BY dateavis DESC LIMIT 5");
												$rep2=$reponse2->fetchAll();
												
												$j=0;
												foreach ($rep2 as $value) {
																if (!empty($value)) 

														{
															echo "<div id='avisprod'>";
															echo "<table>";
															echo "<tr>";
															echo "<th id='nom'>Nom</th>";
															echo "<th id='nom'>Avis</th>";
															echo "<th id='nom'>Date</th>";
															echo "</tr>";
															echo "<tr>";
															echo "<td id='resultnom'>".$value[0]."</td>";
															echo "<td id='resultnom'>".$value[1]."</td>";
															echo "<td id='resultnom'>".$value[2]."</td>";
															echo "</tr>";
															echo "</table>";
															echo "</div>";

															$i ++;
														}
															else
														{
											
															echo "Pas de commentaires pour cet article";
					    								}

					    							}
												?>
												</div>
						</section>
						<footer>
								<?php include("footer.php");?>
						</footer>
						
				
			</body>
</html>