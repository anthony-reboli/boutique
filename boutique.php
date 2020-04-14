<?php session_start();

?>
<html>
<head>
    <title>Boutique</title>
    <link rel="stylesheet" href= "boutique.css">
</head>
<body id="boutique">
    <header id="headB">
        <?php include("bar-nav.php");?>
    </header>
        <main id="corpboutique">
            <?php
            $bdd= mysqli_connect("localhost","root","","boutique");
            ?>

            <!-- recherche -->
            <section id="formulaire">
                <div id="form-1">

                    <form name="recherche" method="get">
                        <label class="titre">RECHERCHER PAR NOM</label>
                        <br>
                        <input id="rech" type="search"  name="bs"
                        aria-label="rechercher par titre">
                           <br><button class="btnrech" name="recheb"><img width="60" height ='40' src="upload/loupe.jpg"></button> 
                    </form>
                
            <?php

            if (isset($_GET['recheb']))
            {
                $bs=$_GET['bs'];


                $rechercheb= "SELECT * FROM produits WHERE nomproduit LIKE '$bs'";

                $recherchebq= mysqli_query($bdd,$rechercheb);
                $resultatb= mysqli_fetch_all($recherchebq);






                if (!empty($bs) and !empty($bs) == (isset($resultatb[0][1])))
                    {
                        echo "<h1>Resultat de la recherche</h1>";

                        foreach($resultatb as $data6)
                            {
                                $j=0;

                                $did=$data6[0];
                                $img=$data6[4];
                                $dnp=$data6[1];
                                echo" <div class=\"theb2\">";
                                echo "$dnp <br>";
                                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                                echo "<p class=\"p_b\">{$data6[3]}</p>";
                                echo "<p class=\"p_b\">{$data6[2]}</p>";
                                echo "</div>";
                                $j++;
                    }
                }

            else    {
                        echo "VOTRE RECHERCHE N'EST PAS ACCESSIBLE";
                    }


            }
            ?>
            </div>

            <!-- Choix de categorie -->



            <div id="form_b2">
                <form method="post" type="">
                    <br>
                    <label class="titre" for="categorie-select">Choisir la categorie:</label>
                    <br>

                    <select class="rech2"  name="pagear" id="categorie-select">
                        <option value="">--choisir une option--</option>
                        <option value="the">the</option>
                        <option value="thehiere">thehiere</option>
                    </select>




                    <?php
                    $requete4="SELECT * from produits where categories = '1'";
                    $query4=mysqli_query($bdd, $requete4);




                    if(isset($_POST['catpage'])){ ?>
                        <select id="rech2" name="sc_b"  id="categorie-select">

                            <?php if($_POST['pagear'] == 'the'){ ?>

                                <option value="sachet">sachets</option>
                                <option value="boite">boites</option>
                            <?php } ?>
                            <?php if($_POST['pagear'] == 'thehiere'){?>

                                <option value="noire">noire</option>
                                <option value="blanc">blanc</option>
                                                            <?php } ?>
                        </select>
                                            <?php } ?>

                       <br><button class="btnrech"  name="catpage"><img width="60" height ='40' src="upload/loupe.jpg"></button>
                    
                </form>
            </div>
         
    </section>




    <h1 class="titre">Notre boutique</h1>
    <section id="contboutique">
        <br>
            <?php 
// categoerie
            if(isset($_POST['catpage']))
            {

                if ($_POST['pagear'] == 'the' and empty($_POST['sc_b']))
                {

                    include("pagination.php");
                    $requete3='SELECT * FROM produits where categories = 1 ORDER BY id DESC limit '.$depart.','.$arpage.' ';
                    
                    $query3=mysqli_query($bdd, $requete3);
                    



                    while($data= mysqli_fetch_assoc($query3))
                    {
                        $i=0;
                        $did=$data['id'];
                        $img=$data['image'];
                        $dnp=$data['nomproduit'];

    
                        echo" <div class=\"theb\">";
                        echo "$dnp <br></a> ";
                        echo "<h1 class=\"nomp\">$dnp </h1><br>";
                        echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\">";
                        echo "<p class=\"nomp\">{$data['description']}</p>";
                        echo "<p class=\"nomp\">{$data['prixproduit']}</p>";
                        echo "<form method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                        echo "</div>";
      
                        $i++;



                    }

                    for ($i=1;$i <=$pagetotal;$i++)
                    {
                        echo '<a href="boutique.php?page='.$i.'>'.$i.'</a> ';
                    }
                }


                    elseif ($_POST['pagear'] == 'the' && $_POST['sc_b'] == 'sachet')  // sous categorie sachet active
                    {
                        include("pagination.php");
                    

                        $requete2='SELECT * FROM produits where categories = 1 and souscategories = "sachet" ORDER BY id DESC limit '.$depart.','.$arpage.' ';

                        $query2=mysqli_query($bdd, $requete2);



                        while($data= mysqli_fetch_assoc($query2))
                        {
                            $i=0;
                            $did=$data['id'];
                            $img=$data['image'];
                            $dnp=$data['nomproduit'];
                            echo" <div class=\"theb\">";
                            echo "$dnp <br> ";
                            echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                            echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                            echo "<p class=\"nomp\">{$data['description']}</p>";
                            echo "<p class=\"nomp\">{$data['prixproduit']}</p>";
                            echo "<form method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                            echo "</div>";
                            $i++;
                        }
                    }
                     elseif ($_POST['pagear'] == 'the' && $_POST['sc_b'] == 'boite')  // sous categorie boite active
                     {
                        include("pagination.php");
                        echo" passe boite" ;
                        $requete2='SELECT * FROM produits where categories = 1 and souscategories = "boite" ORDER BY id DESC limit '.$depart.','.$arpage.' ';
                        $query2=mysqli_query($bdd, $requete2);

                    while($data= mysqli_fetch_assoc($query2))
                    {
                        $i=0;
                        $did=$data['id'];
                        $img=$data['image'];
                        $dnp=$data['nomproduit'];
                        echo" <div class=\"theb\">";
                        echo "$dnp <br> ";
                        echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                        echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                        echo "<p class=\"nomp\">{$data['description']}</p>";
                        echo "<p class=\"nomp\">{$data['prixproduit']}</p>";
                        echo "<form  method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                        echo "</div>";
                        $i++;
                }       
            }

         

         if ($_POST['pagear'] == 'thehiere'and  empty($_POST['sc_b']))
         {
            include("pagination.php");
            $requete3='SELECT * FROM produits where categories = 2 ORDER BY id DESC limit '.$depart.','.$arpage.' ';

            $query3=mysqli_query($bdd, $requete3);
            echo "thehierree";


            while($data= mysqli_fetch_assoc($query3))
            {
                $i=0;
                $did=$data['id'];
                $img=$data['image'];
                $dnp=$data['nomproduit'];
                echo" <div class=\"theb\">";
                echo "$dnp <br> ";
                echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                echo "<p class=\"nomp\">{$data['description']}</p>";
                echo "<p class=\"nomp\">{$data['prixproduit']}</p>";
                echo "<form method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                echo "</div>";
                $i++;
            }
         }


                    elseif($_POST['pagear'] == 'thehiere' && $_POST['sc_b'] == "blanc") // sous categorie sachet active
                    {
                        include("pagination.php");
                        echo" passe blanc" ;

                        $requete2='SELECT * FROM produits where categories = 2 and souscategories = "blanc" ORDER BY id DESC limit '.$depart.','.$arpage.' ';

                        $query2=mysqli_query($bdd, $requete2);

                        while($data2= mysqli_fetch_assoc($query2))
                        {
                            $i=0;
                            $did=$data2['id'];
                            $img=$data2['image'];
                            $dnp=$data2['nomproduit'];
                            echo" <div class=\"theb\">";
                            echo "$dnp <br> ";
                            echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                            echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                            echo "<p class=\"nomp\">{$data2['description']}</p>";
                            echo "<p class=\"nomp\">{$data2['prixproduit']}</p>";
                            echo "<form method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                            echo "</div>";
                            $i++;
                        }
                    }
         elseif ($_POST['pagear'] == 'thehiere' && $_POST['sc_b'] == 'noire')  // sous categorie noire active
         {
            include("pagination.php");
            echo" passe noire" ;

            $requete2='SELECT * FROM produits where categories = 2 and souscategories = "noire" ORDER BY id DESC limit '.$depart.','.$arpage.' ';

            $query2=mysqli_query($bdd, $requete2);

            while($data2= mysqli_fetch_assoc($query2))
            {
                $i=0;
                $did=$data2['id'];
                $img=$data2['image'];
                $dnp=$data2['nomproduit'];

        
                echo" <div class=\"theb\">";
                echo "$dnp <br> ";
                 echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                echo "<p class=\"nomp\">{$data2['description']}</p>";
                echo "<p class=\"nomp\">{$data2['prixproduit']}</p>";
                echo "<form method=\"post\" \"><input type=\"submit\" name=\"boutiqueb[$i]\"></form>";
                echo "</div>";
            
                $i++;
            }
         }
        }
        
        else {
            include("pagination.php");
            $requeteb='SELECT * FROM produits ORDER BY id DESC limit '.$depart.','.$arpage.'';
            $queryb=mysqli_query($bdd, $requeteb);

            while($data= mysqli_fetch_assoc($queryb))
            {
                $i=0;
                $did=$data['id'];
                $img=$data['image'];
                $dnp=$data['nomproduit'];


                echo" <div class=\"theb\">";
                echo "<h1 class=\"nomp2\">$dnp </h1><br>";
                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
                echo "<p class=\"nomp\">{$data['description']}</p>";
                echo "<p class=\"nomp\">prix de vente:{$data['prixproduit']}€</p>";
                echo "</div>";

                $i++;

            }
        ?>

    </section>
    <?php
           echo "<div id='pag'>";
            $pagetotal= ceil($resu[0][0]/$arpage);
            for ($i=1;$i <=$pagetotal;$i++){
                echo '<a id=lien href="boutique.php?page='.$i.'">'.$i.'/</a> ';
            }

        }
        $requete='SELECT * FROM produits where categories = 2 ORDER BY id DESC limit '.$depart.','.$arpage.' ';
        $query=mysqli_query($bdd, $requete);
        $reponse=mysqli_fetch_all($query);
                echo "</div>";
                ?>
<?php include("footer.php");?>
</body>
</html>