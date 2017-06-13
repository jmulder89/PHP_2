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
	
	$klanten = array(
		array(
			'klantnr' => 'A123',
			'voorl' => 'A',
			'voorv' => '',
			'naam' => 'Mulder',
			'adres' => 'demostraat 31',
			'post' => '2345JK',
			'tel' => '0906-0854',
			'plaats' => 'Zwolle'),
		
		array(
			'klantnr' => 'B124',
			'voorl' => 'B',
			'voorv' => '',
			'naam' => 'Mulder',
			'adres' => 'demostraat 31',
			'post' => '2345JK',
			'tel' => '0906-0854',
			'plaats' => 'Zwolle'),
		
		array(
			'klantnr' => 'C124',
			'voorl' => 'C',
			'voorv' => '',
			'naam' => 'Mulder',
			'adres' => 'demostraat 31',
			'post' => '2345JK',
			'tel' => '0906-0854',
			'plaats' => 'Zwolle'),
	);

	
	$sql = "insert into klanten 
			(klantnummer, voorletters, voorvoegsel, naam, adres, postcode, telefoonnummer, plaats)
			values 
			(:klantnr, :voorl, :voorv, :naam, :adres, :post, :tel, :plaats)"; //placeholders
		
	$stmt = $pdo->prepare($sql);

	
	$stmt->bindparam(':klantnr', 	$klantnr, 	PDO::PARAM_STR);
	$stmt->bindparam(':voorl', 		$voorl, 	PDO::PARAM_STR);
	$stmt->bindparam(':voorv', 		$voorv, 	PDO::PARAM_STR);
	$stmt->bindparam(':naam', 		$naam, 		PDO::PARAM_STR);
	$stmt->bindparam(':adres', 		$adres, 	PDO::PARAM_STR);
	$stmt->bindparam(':post', 		$post, 		PDO::PARAM_STR);
	$stmt->bindparam(':tel', 		$tel, 		PDO::PARAM_STR);
	$stmt->bindparam(':plaats',		$plaats,	PDO::PARAM_INT);
	
	
	foreach($klanten as $klant){			//veel type werk
			
				$klantnr 	= $klant["klantnr"];
				$voorl 		= $klant["voorl"];
				$voorv 		= $klant["voorv"];
				$naam 		= $klant["naam"];
				$adres 		= $klant["adres"];
				$post 		= $klant["post"];
				$tel 		= $klant["tel"];
				$plaats		= $plaats["plaats"];
				$stmt->execute();		
	}									
	

		//index.php?plaats=Rotterdam\'; drop database reisbureau;

		// https://phpdelusions.net/pdo
		// http://www.phptuts.nl/view/27/1/
		// https://github.com/datacharmer/test_db       //test database

		//seed script tool, db lorum ipsum
		
	?>
