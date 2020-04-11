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

<body id="bodind">
    
    <main id="mainindex">
        <h1 id="h1I">LES NOUVEAUX PRODUITS</h1>
    
        <?php
         $bdd= mysqli_connect("localhost","root","","boutique");
        include("infoindex.php");
         ?>

        <section id="conttexte">
                
            <section id="newp">
                            <div id="photorec">
                <?php
               $requete1= "SELECT * FROM produits ORDER BY datecreation DESC LIMIT 4";
               $query1 =mysqli_query($bdd , $requete1);

               while($data1= mysqli_fetch_assoc($query1))
                    {
                        $i=0;
                        $did=$data1['id'];
                        $img=$data1['image'];
                        $dnp=$data1['nomproduit'];
                        echo" <div class=\"indexp\">";
                        echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout2\" src=\"upload/$img\"></a>";
                        echo "</div>";
                        $i++;
                    }
                ?>
                            </div>
            </section>
            <br>
                <section id="presentation">
                    
                    <div class="preind">
                        <div class="titreI">
                        <h1> Presentation du site</h1><br>
                        </div>
                        <p class="blocI">Bonjour est Bienvenue sur notre site de vente en ligne.<br>
                        <br>Ce site a etait creer pour vous les fan de thé qui on pas le temp de chercher en boutique le thé qui vous conviens</p>
                    </div>
                
                        <div class="preind">
                            <div class="titreI">
                            <h1>Presentation des produis</h1>
                            </div>
                        <p class="blocI">On n'est fier de vous présenter nos produits de la plus grande qualiter a petit prix.<br> <br>Soyer pret a tout instants avec nos thé frais et nos théhiere artisanal pour inviter vos amis.
                        </div>

                            <div class="preind">
                        <div class="titreI">
                        <h1>Les STATS DU SITE</h1><br>
                        </div>
                                
                                <p class="blocI">
                                    Il y a actuelement <?php echo $req1[0][0]?> personnes inscrite sur notre site.<br>
                                    <br>Pour un total de <?php echo $req2[0][0]?> articles pour vous satisfaire.<br>
                                    <br>Nos utilisateurs on commander <?php echo $req3[0][0]?> acticles.
                                    Pourquoi pas vous ?
                            </div>
        
            </section>
        

    </main>

    
<?php include("footer.php"); ?>
</body>

</html>