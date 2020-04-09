

  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  <ol>
    <li class="menu-item"><a href="index.php">Home</a></li>
    <li class="menu-item"><a href="boutique.php">boutique</a></li>
    <li class="menu-item"><a href="connexion.php">Connexion</a></li>
    <li class="menu-item"><a href="inscription.php">Inscription</a></li>
  </ol>
   
  
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login']) AND $_SESSION['login'] =='admin')

    {
       
    ?>
    <nav class="menu">
      <ol>
      
        <li class="menu-item"><a href="index.php">Home</a></li>
        <li class="menu-item"><a href="boutique.php">boutique</a></li>
        <li class="menu-item"><a href="profil.php">profil</a></li>
        <li class="menu-item"><a href="panier.php">panier</a></li>
        <li class="menu-item"><a href="admin.php">Espace Admin</a></li>
        <li class="menu-item"><a href="boutique.php?deconnexion=true">Déconnexion</a></li>
        
      </ol>
        
      
    </nav>
 
     <?php
   }
   else(isset($_SESSION['login'])==true)
   
?>
    <nav class="menu">
      <ol>
      
        <li class="menu-item"><a href="index.php">Home</a></li>
        <li class="menu-item"><a href="boutique.php">boutique</a></li>
        <li class="menu-item"><a href="profil.php">profil</a></li>
        <li class="menu-item"><a href="panier.php">panier</a></li>
        <li class="menu-item"><a href="boutique.php?deconnexion=true">Déconnexion</a></li>
        
      </ol>
        
      
    </nav>

   
   <?php

                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:connexion.php");
                   }
                }
    
    
             
    ?>