<?php
    session_start();
    $currentPage = "Acheter";
    include 'include/database.php';
    $acces = mysqli_connect("localhost","root","","siteweb");
    $choix_table = "SELECT * from post";
    $ensemble_post = mysqli_query($acces,$choix_table);
    $cotenu = mysqli_fetch_all($ensemble_post, MYSQLI_BOTH);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>SwapMarket</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include 'menu_navigation.php'; ?>
        <div id = content>
            <p>
                <?php 
                var_dump($contenu);
                ?>
            </p>
        </div>
    </body>
</html>