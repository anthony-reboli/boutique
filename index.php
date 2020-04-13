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

                <img id ="photoind" src="upload/theindex.jpg">
                <h1 class="titre"> Presentation du site</h1><br>
                        <div class="titreII">
                            
                            <p class="text">Bonjour, bienvenue sur notre site de vente en ligne.<br>
                            <br>Ce site a été crée pour vous les fans de thé qui ont pas le temps de chercher en boutique le thé qui vous conviennent</p>
                        </div>
    
    <main id="mainindex">
        <h1 class="titre">Les dernieres Nouveautes</h1>
    
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
                                        echo "<a href=\"produit.php?p=$did\"><img id='imgnouv' height='200' width='300' class=\"imagebout2\" src=\"upload/$img\"></a>";
                                        echo "</div>";
                                        $i++;
                                    }
                                ?>
                            </div>
            </section>
            <br>
                <section id="presentation">
                    <h1 class="titre">Presentation des produits</h1> 
                        <div class="titreI"> 
                            <p class="text">On est fier de vous présenter nos produits de la plus grande qualité à petit prix.</p>
                            <section class="slider">
                                    <div class="slides">
                                        <div class="slide"><img height="300" width="600" class="defilé" src="upload/theiere1.jpg"></div>
                                        <div class="slide"><img height="300" width="600" class="defilé" src="upload/thenoir.jpg"></div>
                                        <div class="slide"><img height="300" width="600" class="defilé" src="upload/theiere1.jpg"></div>
                                        <div class="slide"><img height="300" width="600" class="defilé" src="upload/the5.jpg"></div>
                                        <div class="slide"><img height="300" width="600" class="defilé" src="upload/theindex.jpg"></div>
                                    </div>      
                                      
                            </section>
                                        <p class="text">Soyez prêts à tout instant avec nos thés frais et nos théières artisanales pour inviter vos amis.</p>
                        </div>

                    <h1 class="titre">Les Stats Du Site</h1><br>
                        <div class="titreI">
                                     <p class="text">Il y a actuellement : <?php echo $req1[0][0]?> personnes inscrites sur notre site!<br>
                                    <br>Pour un total de : <?php echo $req2[0][0]?> articles pour vous satisfaire!<br>
                                    <br>Nos utilisateurs ont commandés : <?php echo $req3[0][0]?> acticles!<br>
                                    <br>Pourquoi pas vous ? 
                                </p>
                        </div>
        
            </section>
        

    </main>

<?php include("footer.php"); ?>
</body>

</html>