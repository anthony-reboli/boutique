<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Boutique </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<header>
     <?php  include("bar-nav.php");?>
</header>

<body>
    
    <main id="mainindex">

        <?php $bdd= mysqli_connect("localhost","root","","boutique");
         if (isset($_SESSION['login'])) { ?>

            <section id="conttexte">
                <p id="texte"> Bonjour  <?php echo $_SESSION['login']?> et bienvenue sur notre boutique </p>
            </section>
            <div id="photorec">
                <?php
               $requete1= "SELECT * FROM produits ORDER BY datecreation DESC LIMIT 4";
               $query1 =mysqli_query($bdd , $requete1);
 echo "<h1>LES NOUVEAUX PRODUIT</h1>";
               while($data1= mysqli_fetch_assoc($query1))
                    {
                        $i=0;
                        $did=$data1['id'];
                        $img=$data1['image'];
                        $dnp=$data1['nomproduit'];

        //echo"<section class=\"thep\">";
                        echo" <div class=\"indexp\">";
        // echo "<h1>{<a href =\"produit.php?id=$did\">$data['nomproduit']}</h1></a>";
                        echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                        echo "</div>";
        //echo"</section>";
                        $i++;



                    }
                ?>
            </div>

    <section id="presentation">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore laboriosam esse earum in, facere, eligendi, aliquam illo eius error voluptatem necessitatibus deleniti odit rem. Consectetur reprehenderit quos, voluptatibus expedita molestiae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, consequatur, placeat. Amet, animi esse quas voluptatem excepturi in tenetur consectetur obcaecati, eaque quo explicabo voluptas architecto quae! Unde, at quisquam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae iusto hic neque quam, sapiente eligendi adipisci porro, odio incidunt, asperiores illum earum natus reprehenderit quo atque aspernatur commodi, cumque deleniti!</p>
    </section>
        <?php                                 }
         else { ?>

            <section>
                <p> Bonjour </p>
            </section>
        <?php } ?>

    </main>

    

</body>

</html>