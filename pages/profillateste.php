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
                <label for="newLogin">Nouveau login</label>
                <input class="form_input" type="text"  name="newlogin" placeholder="<?php echo $login?>">
                <button type="submit" name="submitlogin" value="Envoyer">Màj login</button>
            </section>

            <section class="flex column a_center">
                <label for="newmail">Nouvelle adresse mail</label>
                <input type="email" name="newmail" placeholder="<?php echo $email?>">
                <button type="submit" name="submitMail" value="Envoyer">Màj mail</button>
            </section>

            <section class="flex j_around a_center">
                <article class="flex column j_center a_center">
                    <label for="newpassword">Nouveau mot de passe</label>
                    <input class="form_input" type="newpassword" name="newpassword" placeholder="Nouveau mot de passe">
                   	<button type="submit" name="submitpassword" value="Envoyer">Mettre à jour mon profil</button>
                </article>
                <article class="flex column j_center a_center">
                    <label for="newPassword">Confirmer le mot de passe</label>
                    <input class="form_input" type="password" name="confpassword" placeholder="Confirmer votre mot de passe">
                </article>


            <?php


                if (isset($_POST['submitmail']))
                {$email1 = $_POST['newmail'];
                $reqMail=mysqli_query($bdd,"UPDATE utilisateurs SET email='$email1' WHERE  id = $id ");
                $resMail=mysqli_fetch_all($reqMail,MYSQLI_ASSOC);
                $email = $res[0]['email'];}

                else if (isset($_POST['submitpassword']))
                {$password1 = $_POST['newpassword'];
                $reqPassword=mysqli_query($bdd,"UPDATE utilisateurs SET password='$password1' WHERE  id = $id ");
                $resPassword=mysqli_fetch_all($reqPassword,MYSQLI_ASSOC);
                $password = $res[0]['password'];}

                else if (isset($_POST['submitlogin']))
                {$login1 = $_POST['newlogin'];
                $reqLogin=mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1' WHERE  id = $id ");
                $resLogin=mysqli_fetch_all($reqLogin,MYSQLI_ASSOC);
                $login = $res[0]['login'];}
            ?> 


        </form>
    </main>
    <?php require_once('footer.php');?>
</body>
</html>