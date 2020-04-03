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
      $rep= $connexion->query("SELECT * FROM panier  WHERE id_utilisateurs=$id_utilisateurs  ");
      $tab = $rep->fetchAll();
      $id_panier = $tab[0][0];
      $id_user = $tab[0][1];
      $id_produit = $tab[0][2];
      $quantiteproduit = $tab[0][3];
      $datepanier = $tab[0][4];
      $prix_total = $tab[0][5];
    //var_dump($tab);


      
      $rep2= $connexion->query("SELECT * FROM panier INNER JOIN produits WHERE panier.id_utilisateurs=$id_utilisateurs AND produits.id=$id_produit ");
     // var_dump($rep2);
      //$tab = $rep->fetchAll();
       
          $test = $rep2->fetchAll();
     
      
      //$reponse2 = $connexion->query("SELECT * FROM `produits` WHERE id=$id_produit");
     // var_dump($reponse2);
         //$test2=$reponse2->fetchAll();       
            return $test;
          //  return $test2;
    }





   public function supprimePanier()
  {
   unset($test);
  }


   public function MontantGlobal($quantiteproduit,$id_produit,$prix_total)
   {
   $total=0;
   var_dump($test[1]);
   for($j = 0; $j < count($test[1]); $j++)
   {
      $total = $values[3][$j] * $values[8][$j];
   }
   return $total;
  }


 
}
 

?>



   	
