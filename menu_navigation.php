<div id = "header">
	<div class = "leftbox">
		<img src="img/logo.png" width="40" height="40">
		<p>
			<h1>
				SwapMarket
			</h1>
		</p>
	</div>

	<div class = "middlebox">
		<nav class="menu-nav">
			<ul>
				<li class="btn">
					<a href="index.php">
						Accueil
					</a>	
				</li>
				<li class="btn">
					<a href="posts.php">
						Poster une annonce
					</a>
				</li>
				<li class="btn">
					<a href="acheter.php">
						Produits
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<?php
		if(isset($_SESSION['username'])&&(isset($_SESSION['email']))){
			?>
			<div class = "rightbox">
				
				<nav class="menu-nav"><ul>
					<li class="btn">
						<p>
							Bienvenue<br/><?= $_SESSION['username']; ?>
						</p>
					</li>
					<li class="btn">
						<a href="includes/logout.php">
							Déconnexion
						</a>
				</li>
			</ul></nav>
			</div>

			<?php
		}else{
			?>
			<div class = "rightbox">
				<nav class="menu-nav">
					<ul>
						<li class="btn">
							<a href="login.php">
								Se connecter
							</a>
						</li>
						<li class="btn">
							<a href="register.php">
								S'inscrire
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<?php
		}
	?>

	
		
</div>
