<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Boutique </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<header>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="boutique.php">Boutique</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
</header>

<body>
    
    <main>

        <?php if (isset($_SESSION['login'])) { ?>

            <section id="conttexte">
                <p id="texte"> Bonjour  <?php echo $_SESSION['login']?> et bienvenue sur notre boutique </p>
            </section>

        <?php } else { ?>

            <section>
                <p> Bonjour </p>
            </section>
        <?php } ?>

    </main>

    

</body>

</html>