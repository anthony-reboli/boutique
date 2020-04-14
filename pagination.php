<?php
$bdd= mysqli_connect("localhost","root","","boutique");
// bdd
$arpage = 6;
$requete1 = ('SELECT count(id) FROM produits');
$query=mysqli_query($bdd,$requete1);
$resu=mysqli_fetch_all($query);

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

?>