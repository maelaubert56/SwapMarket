
<?php
	session_start();
	$currentPage = "Accueil";

	include 'includes/database.php';
	global $db;
	$con = mysqli_connect("localhost","root","","siteweb");
	$sql = "SELECT * from users";
	if ($result = mysqli_query($con, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}
  
// Close the connection
mysqli_close($con);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SwapMarket</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!--header -->
	<?php include 'menu_navigation.php'; ?>

	<div id = content>
		<p>
			<h3>
			Corps de page
			</h3>
			Nombre d'inscrits: <?= $rowcount;?>
		</p>
	</div>

	<?php include 'includes/footer.php'; ?>

</body>
</html>