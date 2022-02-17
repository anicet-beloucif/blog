<?php 
//co db
    $connection = new \PDO('mysql:host=localhost:3306; dbname=anicet-beloucif_blog; charset=utf8', 'anicet-', 'azerty' );
require_once("functions/db.php"); 
require_once("class/user.php");
require_once("class/class-article.php");

 // CHEMINS
 $path_index="";
 $path_inscription="pages/inscription.php";
 $path_connexion="pages/connexion.php";
 $path_profil="pages/profil.php";
 $path_articles="pages/articles.php";
 $path_create="pages/creer-article.php";
 $path_admin="pages/admin.php";
 $path_deconnexion="pages/deconnexion.php";
 $path_footer='../css/footer.css';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/articles.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OM</title>
</head>
<body class="flex column j_between">
    
   <?php include_once('pages/header.php'); ?>

    <main class="flex column a_center j_around">
        <h1 class="flex">Notre Olympique adoré</h1>
        <section class="flex j_around a_center">
            <p class="txtOm">Marseillais à jamais.</p>
            <p class="txtOm">Plus que des joueurs, une équipe.</p>
        </section>

        <?php
            $NewArticle = new Article;
            $NewArticle->articlepageIndex();
        ?>
    </main>
    <?php require_once('pages/footer.php');?>
</body>
</html>