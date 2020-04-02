<?php
$bdd= mysqli_connect("localhost","root","","boutique");
// bdd
$arpage = 5;
$requete1 = ('SELECT count(id) FROM produits');
$query=mysqli_query($bdd,$requete1);
$resu=mysqli_fetch_all($query);
var_dump($resu[0][0]);

 $pagetotal= ceil($resu[0][0]/$arpage);

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0)
{
    $_GET['page'] = intval($_GET['page']);
    $pagecourante = $_GET['page'];

}
else {
 $pagecourante = 1;
    }

$depart = ($pagecourante-1)*$arpage;


// $requete2 = ('SELECT * FROM produits ORDER BY id DESC limit '.$depart.','.$arpage.'');
// $query2=mysqli_query($bdd,$requete2);
// $resu2=mysqli_fetch_all($query2);
// var_dump($requete2);
// var_dump($resu2);


    
    

    


for ($i=1;$i <=$pagetotal;$i++){
echo '<a href="boutique.php?page='.$i.'">'.$i.'</a> ';
                                }
?>