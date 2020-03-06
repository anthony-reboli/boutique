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
    public function ajouterArticle($nomproduit,$quantiteproduit,$prixproduit){

   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($nomproduit,  $values[1]);

      if ($positionProduit !== false)
      {
         $values[7][$positionProduit] += $quantiteproduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $values[1],$nomproduit);
         array_push( $values[7],$quantiteproduit);
         array_push( $values[2],$prixproduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

   public function MontantGlobal($quantiteproduit,$id_produit,$prix_total)
   {
   $total=0;
   for($i = 0; $i < count($test[1]); $i++)
   {
      $total = $values[7][$i] * $values[1][$i];
   }
   return $total;
}


    function supprimePanier(){
   unset($value);
}



  }

  
 
?>



   	
