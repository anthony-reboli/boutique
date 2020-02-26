<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Boutique </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<header>
     <?php  include("bar-nav.php");?>
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