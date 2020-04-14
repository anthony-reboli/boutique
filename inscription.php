<?php

    session_start();

$connexion =  mysqli_connect("localhost","root","","boutique");
if (!isset($_SESSION["login"])) {
    

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="boutique.css">
</head>

<body id="inscriptionbod">
    <header>
        <?php include("bar-nav.php");?>
    </header>
    <main id="inscriptionmain">
    

    <h1 style="color:#26ec2e;margin-left: 115px;"> Inscription </h1>
        <section>
        

        <form id="forminsc" method='POST' action='inscription.php'>


            <article>
                <label class="labins"> Login </label>
                <br><input type="text" name='login' required />
            </article>

            <article>
                <label class="labins"> Nom </label>
                <br><input type="text" name='nom' required />
            </article>


            <article>
                <label class="labins"> Prénom </label>
                <br><input type="text" name='prenom' required />
            </article>

            <article>
                <label class="labins"> Mot de passe </label>
                <br><input type="password" name='mdp1' required />
            </article>

            <article>
                <label class="labins"> Confirmation de mot de passe </label>
                <br><input type="password" name='mdp2' required />
            </article>


            <article>
                <label class="labins"> Votre adresse </label>
                <br><input type="text" name='adresse' required />
            </article>


            <article>
                <label class="labins"> Votre code postal </label>
                <br><input type="number" name='code' required />
            </article>


            <article>
                <label class="labins"> Votre Email </label>
                <br><input type="email" name='email' required />
            </article>

            <button class="boutonin" name="inscription"><img height="98" width="78" src="upload/buton2.png"></button>

            <?php

        if (isset($_POST['inscription']))
       {
            $login = $_POST['login'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
            $adresse = $_POST['adresse'];
            $code = $_POST['code'];
            $email = $_POST['email'];

        

            if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,nom,prenom,password,adresse,codepostal,email)
                VALUES ('$login','nom','prenom','$mdp','$adresse','$code','$email')";
            $query=mysqli_query($connexion,$sql);
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
        }

    ?>
        
        </form>
    </div>
        
    </section>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté impossible de s'inscrire !!</p>
    </section>
        <?php
    }
    ?>
        </form>
    </section>


   </main>
<?php include('footer.php');?>

</body>

</html>