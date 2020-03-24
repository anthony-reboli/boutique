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

      //$id=$_GET['id'];      
      $id_utilisateurs=$_SESSION['id'];
      $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $reponse = $connexion->query( "SELECT nomproduit,prixproduit,description,image,categories,souscategories,dateajout,quantiteproduit,prix_total FROM produits INNER JOIN panier WHERE produits.id_utilisateurs=$id_utilisateurs");
                
                $test = $reponse->fetchAll();

            return $test;
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



   	
