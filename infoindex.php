<?php
// Compte les utilisateurs
$requete1= "SELECT count(id) FROM utilisateurs";
$query1 =mysqli_query($bdd , $requete1);
$req1=mysqli_fetch_all($query1);

// compte les articles

$requete2= "SELECT count(id) FROM produits";
$query2 =mysqli_query($bdd , $requete2);
$req2=mysqli_fetch_all($query2);

// compte les commande passer

$requete3= "SELECT count(*) FROM commande";
$query3 =mysqli_query($bdd , $requete3);
$req3=mysqli_fetch_all($query3);
