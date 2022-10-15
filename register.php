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
	
	<div id=formulaire>
		<h1>Sign In</h1>
		<form method="post">
			<input type="username" name="username" id="username" placeholder="Votre nom d'utilisateur" required>
			<input type="email" name="email" id="email" placeholder="Votre email" required><br/>
			<input type="password" name="password" id="password" placeholder="Votre Mot de passe"requpasswordired>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre Mot de passe" required><br/>
			<input type="submit" name="formsend" id="formsend" value="S'inscrire">
		</form>
	</div>

	<?php

		if(isset($_POST["formsend"])){

			extract($_POST);

			if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($username)){
				if($password == $cpassword){


					$option =['cost' => 12,];
					$hashpass = password_hash($password, PASSWORD_BCRYPT, $option);



					$c1 = $db->prepare("SELECT username email FROM users WHERE email = :email");
					$c1->execute(['email'=>$email]);
					$c2 = $db->prepare("SELECT username email FROM users WHERE username = :username");
					$c2->execute(['username'=>$username]);


					$q = $db->prepare("INSERT INTO users(username,email,password) VALUES(:username,:email,:password)");


					$count_email = $c1->rowCount();
					$count_username = $c2->rowCount();

					if ($count_email != 0){
						echo "Cet email existe déjà...";
					}else if ($count_username != 0){
						echo "Ce nom d'utilisateur existe déjà...";
					}else{
						$q->execute([
						'username' => $username,
						'email' => $email,
						'password' => $hashpass
						]);
						echo "Le compte a été créé";
						$_SESSION['username'] = $username;
						$_SESSION['email'] = $email;
						header("Location: index.php");
						exit();
					}
				}




				/*if(password_verify($password, $hashpass)){
					echo "meme mdp";
				}
				else{
					echo "pas mm mdp";
				}*/

				}else{
				echo "Les champs ne sont pas tous remplis !";
			}
		}
	?>
	<?php include 'includes/footer.php'; ?>

</body>
</html>