<?php

require_once('../functions/db.php');
require_once('../class/user.php');
 // CHEMINS
 $path_index="../index.php";
 $path_inscription="inscription.php";
 $path_connexion="connexion.php";
 $path_profil="";
 $path_articles="articles.php";
 $path_create="creer-article.php";
 $path_admin="admin.php";
 $path_deconnexion="deconnexion.php";
 $path_footer='../css/footer.css';
 // HEADER


            session_start();
            $id = $_SESSION["id"];
            $bdd= mysqli_connect("localhost:3306","anicet-","azerty","anicet-beloucif_blog");
            $req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");
            $res= mysqli_fetch_all($req,MYSQLI_ASSOC);
            $login = $res[0]['login'];
            $email = $res[0]['email'];
            $password = $res[0]['password']; 
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php require_once('header.php');?>

    <main class="flex a_center column j_around" id="main_connexion">

        <form action="profil.php" method="POST" id="formulaire_edition" class="flex a_center column j_around">

            <section class="flex column a_center j_center">
                <label for="newLogin">Nouveau pseudo</label>
                <input class="form_input" type="text"  name="newlogin" placeholder="<?php echo $login?>">
            </section>

            <section class="flex column a_center">
                <label for="newmail">Nouvelle adresse mail</label>
                <input type="email" name="newMail" placeholder="<?php echo $email?>">
            </section>

            <section class="flex j_around a_center">
                <article class="flex column j_center a_center">
                    <label for="oldPassword">Nouveau mot de passe</label>
                    <input class="form_input" type="password" name="newpassword" placeholder="Nouveau mot de passe">
                </article>
                <article class="flex column j_center a_center">
                    <label for="newPassword">Confirmer le mot de passe</label>
                    <input class="form_input" type="password" name="confpassword" placeholder="Confirmer votre mot de passe">
                </article>
            </section>
            <button type="submit" name="submit" value="Envoyer">Mettre à jour mon profil</button>

            <?php

                if (isset($_POST['submit'])){
                    $user = new User;
                    $user->profile($_POST['newlogin'],$_POST['newMail'],$_POST['newpassword'],$_POST['confpassword']);
					echo "Modifications effectuées";
                }
					   
            ?> 


        </form>
    </main>
    <?php require_once('footer.php');?>
</body>
</html>