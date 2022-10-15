<?php 
	
	session_start();
	$currentPage = "Login";
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

	<div id=formulaire>
		<h1>Login</h1>
		<form method="post">
			<input type="username" name="lusername" id="lusername" placeholder="Votre nom d'utilisateur" required>
			<input type="password" name="lpassword" id="lpassword" placeholder="Votre Mot de passe"  requpasswordired>
			<input type="submit" name="formlogin" id="formlogin" value="S'enregister">
		</form>
	</div>




	<?php
	if(isset($_POST['formlogin']))
	{
		extract($_POST);

		if(!empty($lusername) && !empty($lusername)){
			$q = $db->prepare("SELECT * FROM users WHERE username = :username");
			$q->execute(['username'=>$lusername]);
			$result = $q->fetch();
			
			if($result == true){
				// le compte existe
				if(password_verify($lpassword, $result['password']))
				{
					echo "connexion en cours ...";
					
					header("Location: index.php");

					$_SESSION['username'] = $result['username'];
					$_SESSION['email'] = $result['email'];
					exit();;
				}
				else
				{
					echo "mot de passe incorrect...";
				}
			}
			else
			{
				echo "Le nom d'utilisateur \"" .$lusername."\" n'existe pas...";
			}

		}
		else
		{
			echo "Veuillez completer l'ensemble des champs...";
		}
	}

?>
<?php include 'includes/footer.php'; ?>

</body>
</html>