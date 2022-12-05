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
                
                while ($i < $taille_contenue) {
                    $tempo_photo = $contenu[$i]["photo"];
                    ?>
                    <div class="produit">
                        <h3>
                            <?php echo $contenu[$i]["askbid"],"</br>"; ?>
                            <img class="image_produit" src=<?php echo $tempo_photo ?> alt="Image indisponible"/>
                        </h3>
                            <?php echo $contenu[$i]["model"],"</br> Prix : ",$contenu[$i]["price"],"€</br>Contact : ",$contenu[$i]["contact"]; ?>
                        <form method="post">
                            <!-- <input type="image" src="img/supprimer_transparant.png" name="supprimer" id="supprimer" value="supprimer" width = 32px height= 32px/> -->
                             <input type="submit" name=<?php echo $contenu[$i]["id"]?> id=<?php echo $contenu[$i]["id"]?> value="supprimer l'annonce">
                            <!-- <input type="button" name="supprimer" id="supprimer" value="supprimer"> -->
                        </form>
                        <?php
                        if(isset($_POST[$contenu[$i]["id"]])) {
                            $q = $db->prepare("DELETE FROM posts WHERE id=:supprimer");
                            $q->execute(['supprimer' =>  $contenu[$i]["id"]]);
                            header("Refresh:0");
                        }
                        ?>
                    </div>
                    <?php
                    $i = $i + 1;
                }
                ?>
    </body>
</html>