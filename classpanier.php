<?php

class Panier 
{
    public $id_utilisateurs = '';
    public $quantiteproduit = '';
    public $id_produit = '';
    public $datepanier = '';
    public $prix_total = '';
   
 
    public function creationPanier($id_utilisateurs)
    {
      $id=$_GET['id'];
      $id_utilisateurs=$_SESSION['login'];
      $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $reponse = $connexion->query( "SELECT nomproduit,prixproduit,description,image,categories,souscategories,dateajout,quantiteproduit,prix_total FROM produits INNER JOIN panier WHERE produits.id_utilisateurs='$id'");
                
                $test=$reponse->fetchAll();

            return $test;
          }


    public function ajouterArticle($id_utilisateurs,$id_produit,$quantiteproduit,$prix_total){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($id_produit,  $values[0]);

      if ($positionProduit !== false)
      {
         $values[7][$positionProduit] += $quantiteproduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $values[0],$id_produit);
         array_push( $values[7],$quantiteproduit);
         array_push( $values[8],$prix_total);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


    public function modifierQTeArticle($id_produit,$quantiteproduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($quantiteproduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($id_produit,  $values[0]);

         if ($positionProduit !== false)
         {
          $values[7][$positionProduit] = $quantiteproduit ;
         }
      }
      else
      supprimerArticle($id_produit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}





   public function supprimerArticle($id_produit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $values2=array();
      $values2[0] = array();
      $values2[7] = array();
      $values2[1] = array();
      $values2['verrou'] = $values2['verrou'];

      for($K = 0; $K < count($values[0]); $K++)
      {
         if ($values[0][$K] !== $id_produit)
         {
            array_push( $values2[0],$values[0][$K]);
            array_push( $values2[7],$values[7][$K]);
            array_push( $values2[1],$values[1][$K]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $values =  $values2;
      //On efface notre panier temporaire
      unset($values2);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}




 
public function isVerrouille(){
   if (isset($values) && $values['verrou'])
   return true;
   else
   return false;
}


public function compterArticles()
{
   if (isset($values))
   return count($values[1]);
   else
   return 0;

}




   public function MontantGlobal($quantiteproduit,$id_produit,$prix_total)
   {
   $total=0;
   for($j = 0; $j < count($test[1]); $j++)
   {
      $total = $values[7][$j] * $values[1][$j];
   }
   return $total;
  }


 
}
 

?>



   	
