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

  public function ajoutproduit($id_produit)
      {
    $qts=1;
   for($i = 1; $i < count($test[0]); $i++)
   {
     $qts=$values[7][$i] * $values[1][$i];
   }
   return $qts;

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



   	
