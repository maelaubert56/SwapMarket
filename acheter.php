<?php
   session_start();
   $currentPage = "Products";
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
        <?php 
        include 'menu_navigation.php'; 
        include 'includes/database.php';
		global $db;
	    ?>

        <div id = content>
                <h3>Les produits</h3>
                <!--
                <link href="./home.css" rel="stylesheet" />
                    <div class="home-container">
                        <div class="home-feature-card">
                        <div class="home-container1">
                            <div class="home-container2">
                            <div class="home-container3">
                                <h2 class="home-text">Nom chaussure</h2>
                                <button class="home-button button">
                                <svg viewBox="0 0 1024 1024" class="home-icon">
                                    <path
                                    d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"
                                    ></path>
                                </svg>
                                </button>
                            </div>
                            </div>
                        </div>
                        <img
                            alt="image"
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHNob2VzfGVufDB8fHx8MTY3MDM0MTgyNg&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=200"
                            class="home-image"
                        />
                        <span class="home-text1">Price : 80€</span>
                        <span class="home-text2">Contact : 0780415684 </span>
                        </div>
                    </div>
-->
                <?php 
                //var_dump($contenu);
                $i = 0;

                while ($i < $taille_contenue) {
                    $tempo_photo = $contenu[$i]["photo"];
                    ?>
                    

                    <div class="produit">
                        <h3>
                            <?php echo $contenu[$i]["askbid"],"</br>"; ?>
                            <img class="image_produit" src=<?php echo $tempo_photo ?> alt="image indisponible..."/>
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