<?php
	$host 		= 	'localhost';
	$db 		= 	'reisbureau'; 		// db name
	$username 	= 	'Jeroen2'; 			//ROOT is no-go, rechten zijn CRUD. Create, Read, Update, Delete. beperkt tot bovengenoemde DB.
	$password 	= 	'Welkom123';
	$charset 	= 	'utf8';
	
	$dsn = "mysql:host = $host; dbname=$db; charset=$charset";
	$opt = [
				PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
	];
	
	$pdo = new PDO($dsn, $username, $password, $opt);
	
	//update DB
	$usql = "update klanten set telefoonnummer = :tel where klantnummer = :klantnr";

	$ustmt = $pdo->prepare($usql);
	$ustmt->bindparam(':tel', $tel, PDO::PARAM_STR);
	$ustmt->bindparam(':klantnr', $klantnr, PDO::PARAM_STR);
	$klantnr = 'A123';
	$ustmt->execute();
	
	//index.php?plaats=Rotterdam\'; drop database reisbureau;

		// https://phpdelusions.net/pdo
		// http://www.phptuts.nl/view/27/1/
		// https://github.com/datacharmer/test_db       //test database

		//seed script tool, db lorum ipsum
		
	?>
