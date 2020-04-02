<?php

class Panier 
{
    public $id_utilisateurs = '';
    public $quantiteproduit = '';
    public $id_produit = '';
    public $id_panier = '';
    public $prix_total = '';
   
 
    public function creationPanier($id_utilisateurs)
    {

      $id=$_GET['id'];      
      $id_utilisateurs=$_SESSION['id'];
      $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $rep= $connexion->query("SELECT * FROM panier WHERE id_utilisateurs=$id_utilisateurs ");
      $tab = $rep->fetchAll();
        var_dump($tab);
      $id_panier = $tab[0][13];
      $reponse2 = $connexion->query("SELECT * FROM produits INNER JOIN panier WHERE produits.id_utilisateurs = $id_utilisateurs AND produits.id_panier = $id_panier");
      var_dump($reponse2);
                
                $test = $reponse2->fetchAll();

            return $test;
    }





   public function supprimePanier()
  {
   unset($test);
  }


   public function MontantGlobal($quantiteproduit,$id_produit,$prix_total)
   {
   $total=0;
   for($j = 0; $j < count($test[1]); $j++)
   {
      $total = $values[13][$j] * $values[2][$j];
   }
   return $total;
  }


 
}
 

?>



   	
