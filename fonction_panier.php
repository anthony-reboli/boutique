<?php
session_start();
function creationpanier(){
	if  (isset($_SESSION['produit']))
		$_SESSION['produit']= array();
		$_SESSION['produit']['nomproduit']=array();
		$_SESSION['produit']['qteproduit']=array();
		$_SESSION['produit']['prixproduit']=array();
		$_SESSION['produit']['verrou']=false;
	}
	return true;
}

function ajoutarticle($nomarticle,$qteproduit,$prixproduit){
	if(creationpanier() && verouiller()){
		$positionproduit = array_search($nomarticle,$qteproduit,$prixproduit);
		if ($positionproduit !== false)
			$_SESSION['produit']['nomproduit'][$positionproduit]+=$qteproduit;
	}else{
		array_push($_SESSION['produit']['nomproduit'],$nomproduit);
		array_push($_SESSION['produit']['qteproduit'],$nomproduit);
		array_push($_SESSION['produit']['prixproduit'],$nomproduit);
	}
	else{
		echo "Erreur veuillez contacter l'administrateur du site";
	}

}

function modifierqteproduit($nomproduit,$qteproduit){
	if(creationpanier() && verouiller()){

		$positionproduit = array_search($_SESSION['produit']['nomproduit'],$nomproduit);
		if ($positionproduit!==false) {

			$_SESSION['produit']['nomproduit'],[$positionproduit]=$qteproduit;
		}
}
		else{
			supprimerproduit($nomproduit);
			}
	
	else{
	echo "Erreur veuillez contacter l'administrateur du site";
	}
}

function supprimerArticle($nomproduit){

   if (creationPanier() && !verrouiller())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['nomproduit'] = array();
      $tmp['qteproduit'] = array();
      $tmp['prixproduit'] = array();
      $tmp['verrou'] = $_SESSION['produit']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['nomproduit']); $i++)
      {
         if ($_SESSION['panier']['nomproduit'][$i] !== $produit_Id)
         {
            array_push( $tmp['nomproduit'],$_SESSION['produit']['nomproduit'][$i]);
            array_push( $tmp['qteproduit'],$_SESSION['produit']['qteproduit'][$i]);
            array_push( $tmp['prixproduit'],$_SESSION['produit']['prixproduit'][$i]);
         }

      }

      $_SESSION['produit'] =  $tmp;
      
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['produit']['nomproduit']); $i++)
   {
      $total += $_SESSION['produit']['qteproduit'][$i] * $_SESSION['produit']['prixproduit'][$i];
   }
   return $total;
}

function supprimePanier(){
   unset($_SESSION['produit']);
}

function verrouiller(){
   if (isset($_SESSION['produit']) && $_SESSION['produit']['verrou'])
   return true;
   else
   return false;
}

function compterArticles()
{
   if (isset($_SESSION['produit']))
   return count($_SESSION['produit']['nomproduit']);
   else
   return 0;

}
?>

