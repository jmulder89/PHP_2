<?php
	$host 		= 	'localhost';
	$db 		= 	'reisbureau'; 			// db name
	$username 	= 	'Jeroen2'; 			//ROOT is no-go, rechten zijn CRUD. Create, Read, Update, Delete. beperkt tot bovengenoemde DB.
	$password 	= 	'Welkom123';
	$charset 	= 	'utf8';
	
	$dsn = "mysql:host = $host; dbname=$db; charset=$charset";
	$opt = [
				PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
	];
	
	$pdo = new PDO($dsn, $username, $password, $opt)
	
	$stmt = $pdo->query('select naam from klanten');
	
	while ($row = $stmt->fetch()){
		echo $row['naam']."\n";		//\n = line end
	}
	
	
		// https://phpdelusions.net/pdo
		// https://github.com/datacharmer/test_db       //test database
	?>

