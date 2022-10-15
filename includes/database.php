<?php  
	define ('HOST', 'localhost');
	define('DB_NAME','siteweb');
	define('USER', 'root');
	define('PASS','');
	/*define ('HOST', 'sql.free.fr');
	define('DB_NAME','sylvan_buhard');
	define('USER', 'sylvan.buhard');
	define('PASS','Souris03');*/

	try {
		$db = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOExeption $e) {
		echo $e;
	}
	
?>