<?php 
$nbParPage = 5;
//on effectue la requète sur l'objet que l'on souhaite paginer ( ici des news )
$req1=mysqli_query($bdd,"SELECT count(*) as id FROM produits");
$nbNews=mysqli_fetch($req1);
//$nbnews=$nbnews[0];
echo "il y a $nbNews";

//On calcule le nombre de numéro à afficher en fonction du nombre de news par
//page en arrondissant au nombre supérieur grace a la fonction ceil.
$moy= ceil($nbNews/$nbParPage);
echo "<br>et il y aura $moy page<br>";
//*********** Partie concernant le "bouton" précedent ***********\\
//on vérifie qu'il y a au minimum 2 page a afficher pour utiliser
//la fonction Suivant / précédent
if ($moy>=2)
{
  //on vérifie l'éxistence de la variable page avant les vérifications
  if (isset($_GET['page']))
  {
      //si $_GET['page'] = 1 alors on est a la première page et donc pas besoins
      //de lien vers la précédente qui n'éxiste pas
      if ($_GET['page']==1){echo "Precedent ";}
      //sinon on met le lien en ajoutant +1 page a la page courante
      else
      {
          echo "<a href=\"boutique.php?page=".($_GET['page']-1)."\">Precedent</a> ";
      }
  }
    else{echo "Precedent ";}
}
//*********** fin de la partie concernant le "bouton" précedent ***********\\

//prenons un exemple concret :
// nous avons 10 news dans la base
// a ce moment nous savons donc qu'il y aura 2 page :
// $nbNews = 10 divisé par 5 ( 5 news par page ) = 2 pages.
// on peut déja afficher les numéros :
// on effectue une boucle tant qu'il y a des pages on ajoute un lien
for ($i=0;$i<$moy;$i++)
{
    // on ajoute 1 a $i pour afficher 1-2-3-... au lieu de  0-1-2-3-...
    echo "<a href=\"boutique.php?page=".($i+1)."\"> Page ".($i+1)."</a> ";
}

//*********** Partie concernant le "bouton" suivant ***********\\
//on vérifie qu'il y a au minimum 2 page a afficher pour utiliser
//la fonction Suivant / précédent
if ($moy>=2)
{
  //on vérifie l'éxistence de la variable page avant les vérifications
  if (isset($_GET['page']))
  {
      //si $_GET['page'] = $moy alors on est a la dernière page et donc pas besoins
      //de lien vers la suivante qui n'éxiste pas
      if ($_GET['page']==$moy){echo " Suivant";}
      //sinon on met le lien en ajoutant +1 page a la page courante
      else
      {
          echo " <a href=\"boutique.php?page=".($_GET['page']+1)."\">Suivant</a>";
      }
  }
  else{echo "<a href=\"boutique.php?page=1\">Suivant</a>";}
}
//*********** fin de la partie concernant le "bouton" Suivant ***********\\

echo "<br>La page courante est :".$_GET['page'];
?>