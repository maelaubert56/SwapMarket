<?php 
	
	session_start();
	$currentPage = "Signin";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SwapMarket</title>
	<link rel="stylesheet" type="text/css" href="css/style-logPages.css">
</head>
<body>
	<!--header -->
	<?php  

		include 'includes/database.php';
		global $db;
	?>

	<div id = "header">
		<div class = title>
			<div>
				<a href="index.php">
					<img class= img src="img/logo.png" width="76" height="52">
				</a>
			</div>
			<div class = "TitleText">
				<a href="index.php"><h1>
					SwapMarket 
				</h1></a>
			</div>
		</div>
	</div>
	
	<<div id=formulaire>
		<h1>poster</h1>
		<form method="post">
			<input type="model" name="model" id="model" placeholder="votre modèle" required>
            <input type="price" name="price" id="price" placeholder="votre prix" required>
			<input type="contact" name="contact" id="contact" placeholder="votre n° de tel" required>
			<p>Vente ou achat ?</br>
			<input type="radio" name="askbid" id="askbid" value="Vend" required>vente</br>
			<input type="radio" name="askbid" id="askbid" value="Achète" required>achat</p>
            <!-- <input type="askbid" name="askbid" id="askbid" placeholder="vente ou achat ?" required> -->
			<input type="url" name="photo" id="photo" placeholder="copier le lien internet vers une photo de l'article" required>
			<input type="submit" name="formulaire" id="formulaire" value="Poster">
		</form>
	</div>

	<?php
		if(isset($_POST["formulaire"])){

			extract($_POST);

			if(!empty($model) && !empty($price) && !empty($contact) && !empty($askbid) ){
                $q = $db->prepare("INSERT INTO posts(model,price,contact,askbid,photo) VALUES(:model,:price,:contact,:askbid,:photo)");
                $q->execute([
                'model' => $model,
                'price' => $price,
                'contact' => $contact,
                'askbid' => $askbid,
				'photo' => $photo
                
                ]);
                echo "Le post à été ajouté";
                header("Location: index.php");
                exit();
					
				

            }else{
            echo "Les champs ne sont pas tous remplis !";
            }
            
        }
	?>
	<?php include 'includes/footer.php'; ?>

</body>
</html>