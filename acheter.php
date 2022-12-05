<?php
   session_start();
   $currentPage = "Acheter";
   //include 'includes/database.php';
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
        <link rel="stylesheet" type="text/css" href="css/style_produit.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'menu_navigation.php'; ?>
        <?php  

		include 'includes/database.php';
		global $db;
	?>
        <div id = content>
                <h3>Les produits</h3>
                <?php 
                //var_dump($contenu);
                $i = 0;
                while ( $i + 3 < $taille_contenue) {
                    for( $j = 0; $j < 3; $j = $j + 1) {
                        $tempo_photo = $contenu[$i + $j]["photo"];
                        ?>
                        <div class="produit">
                        <h3>
                            <img class="image_produit" src=<?php echo $tempo_photo ?> alt="Nous excuson pour la gène occasioné"/>
                        </h3>
                        <?php
                        echo $contenu[$i + $j]["askbid"]," ",$contenu[$i + $j]["model"]," pour ",$contenu[$i + $j]["price"],". Pour rentrer en contact appeler le ",$contenu[$i + $j]["contact"];
                        ?>
                        <form method="post">
                            <!-- <input type="image" src="img/supprimer_transparant.png" name="supprimer" id="supprimer" value="supprimer" width = 32px height= 32px/> -->
                             <input type="submit" name=<?php echo $contenu[$i + $j]["id"]?> id=<?php echo $contenu[$i + $j]["id"]?> value="supprimer">
                            <!-- <input type="button" name="supprimer" id="supprimer" value="supprimer"> -->
                        </form>
                        <?php
                        if(isset($_POST[$contenu[$i + $j]["id"]])) {
                            printf("Voulez-vous vraiment supprimez cette annonce ?");
                            $q = $db->prepare("DELETE FROM posts WHERE id=:supprimer");
                            $q->execute(['supprimer' =>  $contenu[$i + $j]["id"]]);
                        }
                        ?>
                        </div>
                        <?php
                    }
                    $i = $i + 3;
                }
                while ($i < $taille_contenue) {
                    $tempo_photo = $contenu[$i]["photo"];
                    ?>
                    <div class="produit">
                        <h3>
                            <img class="image_produit" src=<?php echo $tempo_photo ?> alt="Nous excuson pour la gène occasioné"/>
                        </h3>
                        <?php echo $contenu[$i]["askbid"]," ",$contenu[$i]["model"]," pour ",$contenu[$i]["price"],". Pour rentrer en contact appeler le ",$contenu[$i]["contact"]; ?>
                        <form method="post">
                            <!-- <input type="image" src="img/supprimer_transparant.png" name="supprimer" id="supprimer" value="supprimer" width = 32px height= 32px/> -->
                             <input type="submit" name=<?php echo $contenu[$i]["id"]?> id=<?php echo $contenu[$i]["id"]?> value="supprimer">
                            <!-- <input type="button" name="supprimer" id="supprimer" value="supprimer"> -->
                        </form>
                        <?php
                        if(isset($_POST[$contenu[$i]["id"]])) {
                            printf("Voulez-vous vraiment supprimez cette annonce ?");
                            $q = $db->prepare("DELETE FROM posts WHERE id=:supprimer");
                            $q->execute(['supprimer' =>  $contenu[$i]["id"]]);
                        }
                        ?>
                    </div>
                    <?php
                    $i = $i + 1;
                }
                ?>
    </body>
</html>