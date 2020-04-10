<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="boutique.css">
    <title>Profil</title>
</head>
<body class="bodyc">
<header>
  <?php
  session_start();
  include("bar-nav.php");
  if (isset($_SESSION['login']))
  {
    $connexion = mysqli_connect("localhost","root","","boutique");

    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
  ?>
</header>
<main id="mainprof">
                <?php
    if(isset($_GET['id']))
    {
      ?>

      <section id="connexion">
        <?php
      // include qui permet de voir les info personel
      include("infoprof.php");
                  ?>
      </section>
      <?php
      // include qui permet de rajouter un avis
      include ("avis.php");

    }
    else{
          ?>
          <section id="connexion">
          <?php
          include("infoprof.php");
            ?>
          </section>
        
                    <div>
          <h1>Les commandes de vos produits</h1>
          </div>
          <section id="commandepro">

          <?php
          
          $comd= "SELECT produits.prixproduit,nomproduit,quantiteproduit,image,id_produit FROM `commande` inner join produits on commande.id_produit = produits.id  WHERE id_utilisateur = '".$data['id']."' ORDER BY dateajout DESC LIMIT 9";

          $cmdquery= mysqli_query($connexion,$comd);
          $resultatcmd= mysqli_fetch_all($cmdquery);


          $i=0;

          foreach($resultatcmd as $data6)
          {
            



            

            $did=$data6[0];
            $img=$data6[3];
            $dnp=$data6[1];

            
            echo" <div class=\"theb2\">";
    // echo "<h1>{<a href =\"produit.php?id=$did\">$data['nomproduit']}</h1></a>";
            echo "<a href=\"profilitem.php?p=$did\">$dnp <br>";
            echo "<img class=\"imagebout\" src=\"upload/$img\"></a>";
            echo "<p class=\"p_b\"> prix:{$data6[0]}</p>";
            echo "<p class=\"p_b\">quantiter:{$data6[2]}</p>";



            
            
            ?>

            <!-- je creer le GET id pour recuperer id pour avis -->
            <form method="post">
            <a href="profil.php?id=<?php echo"$data6[4]"?>" target="_blank"><input type="button" name="avis<?php echo"[$i]"?>" value="donner un avis"></a>
            </form>

            <?php
            echo "</div>";
            
            $i++;

          }


          ?>
          </section>
          <?php


      }

    if (isset($_POST['Modifier']))
    {


      $login = $_POST['login'];
      $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));

      $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
      $query2=mysqli_query($connexion,$requete2);
      session_unset();
      header("location:connexion.php?reconnect=1");
    }
  }
  else 
  {
  ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
        <?php
  }
  

?>
 
  </main>
</body>
</html>

        
