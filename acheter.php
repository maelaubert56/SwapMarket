<?php
    session_start();
    $currentPage = "Acheter";
    include 'includes/database.php';
    $acces = mysqli_connect("localhost","root","","siteweb");
    $choix_table = "SELECT * from posts";
    $ensemble_post = mysqli_query($acces,$choix_table);
    $contenu = mysqli_fetch_all($ensemble_post, MYSQLI_BOTH);
    $taille_contenue = mysqli_num_rows($ensemble_post);
    mysqli_close($acces);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>SwapMarket</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'menu_navigation.php'; ?>
        <div id = content>
            <p>
                <h3>Les produits</h3>
                <?php 
                var_dump($contenu);
                $i = 0;
                while ( $i + 3 < $taille_contenue) {
                    for( $j = 0; $j < 3; $j = $j + 1) {
                        printf("%s pour %d euros disponible chez %s.\t",$contenu[$i + $j][model],$contenu[$i + $j][price],$contenu[$i + $j][contact]);
                    }
                    $i = $i + 3;
                    printf("\n");
                }
                while ($i < $taille_contenue) {
                    printf("%s pour %d euros disponible chez %s.\t",$contenu[$i][model],$contenu[$i][price],$contenu[$i][contact]);
                }
                ?>
            </p>
        </div>
    </body>
</html>