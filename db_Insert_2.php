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
			':klantnr' => 'T108',
			':voorl' => 'Q',
			':voorv' => '',
			':naam' => 'Dolf',
			':adres' => 'testboulevard 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			':plaats' => 'Zwolle'),
		
		array(
			':klantnr' => 'T109',
			':voorl' => 'W',
			':voorv' => '',
			':naam' => 'Dolf',
			':adres' => 'testboulevard 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			':plaats' => 'Zwolle'),
		
		array(
			':klantnr' => 'T103',
			':voorl' => 'R',
			':voorv' => '',
			':naam' => 'Dolf',
			':adres' => 'testboulevard 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			':plaats' => 'Zwolle'),
			
	);

	
	$sql = "insert into klanten 
			(klantnummer, voorletters, voorvoegsel, naam, adres, postcode, telefoonnummer, plaats)
			values 
			(:klantnr, :voorl, :voorv, :naam, :adres, :post, :tel, :plaats)"; //placeholders
		
	$stmt = $pdo->prepare($sql);							

	try {
		foreach($klanten as $klant){
			$stmt->beginTransaction();
			$stmt ->execute($klant);
			$stmt->commit();
		}
	}
	catch(PDOException $e){
		if(isset($stmt)){
			$stmt->rollback();
		}
		
		echo '<pre>';
		echo 'Regel: '.$e->getLine().'</br>';
		echo 'Bestand: '.$e->getFile().'</br>';
		echo 'Foutmelding: '.$e->getMessagee().'</br>';
		echo '</pre>';
	}
	

		//index.php?plaats=Rotterdam\'; drop database reisbureau;

		// https://phpdelusions.net/pdo
		// http://www.phptuts.nl/view/27/1/
		// https://github.com/datacharmer/test_db       //test database

		//seed script tool, db lorum ipsum
		
	?>
