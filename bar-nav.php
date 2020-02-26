  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  <ol>
 
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="boutique.php">Boutique</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        </ul>

  </ol>
   
  
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login'])=='admin')

    {
       
    ?>
    <nav class="menu">
      <ol>
      	<li><a href="index.php">Accueil</a></li>
            <li><a href="boutique.php">Boutique</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="admin.php">Espace Administrateur</a></li>
            <li><a href="admin.php?deconnexion=true">Déconnexion</a>
      </ol>
        
      
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
    
    }
             
    ?>


        


