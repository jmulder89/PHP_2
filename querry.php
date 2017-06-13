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
	
	$pdo = new PDO($dsn, $username, $password, $opt)
	
	$stmt = $pdo->query('select naam from klanten');

	$plaats = $pdo->quote('select plaats from klanten'); 			

	$stmt = $pdo->query('select naam from klanten where plaats = "'.$plaats.'"') 
	
	while ($row = $stmt->fetch()){
		echo $row['naam']."</br>";		//\n = line end
	}

	$klanten = array(
		array(
			':klantnr' => 'A123',
			':voorl' => 'A',
			':voorv' => '',
			':naam' => 'Mulder',
			':adres' => 'demostraat 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			':age' => 27,)
		
		array(
			':klantnr' => 'B124',
			':voorl' => 'B',
			':voorv' => '',
			':naam' => 'Mulder',
			':adres' => 'demostraat 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			'age' => 27,)
		
		array(
			':klantnr' => 'C124',
			':voorl' => 'C',
			':voorv' => '',
			':naam' => 'Mulder',
			':adres' => 'demostraat 31',
			':post' => '2345JK',
			':tel' => '0906-0854',
			':age' => 27,)
	)

	
	$sql = "insert into klanten 
			(klantnummer, voorletters, voorvoegsel, naam, adres, postcode, telefoonnummer)
			values 
			(:klantnr, :voorl, :voorv, :naam, :adres, :post, :tel)"; //placeholders
		
	$stmt = $pdo->prepare($sql);

	/*
	$stmt->bindparam(':klantnr', 	$klantnr, 	PDO::PARAM_STR);
	$stmt->bindparam(':voorl', 		$voorl, 	PDO::PARAM_STR);
	$stmt->bindparam(':voorv', 		$voorv, 	PDO::PARAM_STR);
	$stmt->bindparam(':naam', 		$naam, 		PDO::PARAM_STR);
	$stmt->bindparam(':adres', 		$adres, 	PDO::PARAM_STR);
	$stmt->bindparam(':post', 		$post, 		PDO::PARAM_STR);
	$stmt->bindparam(':tel', 		$tel, 		PDO::PARAM_STR);
	$stmt->bindparam(':age', 		$age, 		PDO::PARAM_INT);
	*/	

	//$voorl = $_POST["voorl"];
	
	/*
	foreach($klanten as $klant){			//veel type werk
			$klantnr 	= $klant["klantnr"];
			$voorl 		= $klant["voorl"];
			$voorv 		= $klant["voorv"];
			$naam 		= $klant["naam"];
			$adres 		= $klant["adres"];
			$post 		= $klant["post"];
			$tel 		= $klant["tel"];
			$age 		= $klant["age"];
			$stmt->execute();
	}										
*/

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
	
	//update DB
	$usql = "update klanten set telefoonnummer = :tel where klantnummer = :klantnr";

	$ustmt = $pdo->prepare($usql);
	$ustmt->bindparam(':tel', $tel, PDO::PARAM_STR);
	$ustmt->bindparam(':klantnr', $klantnr, PDO::PARAM_STR);
	$klantnr = 'A123';
	$ustmt->execute();

	//$stmt->execute(array($klantnr, $voorl, $voorv, $naam, $adres, $post, $tel)); //onveilig, geen vraagtekens maar placeholders

	

		//index.php?plaats=Rotterdam\'; drop database reisbureau;

		// https://phpdelusions.net/pdo
		// http://www.phptuts.nl/view/27/1/
		// https://github.com/datacharmer/test_db       //test database

		//seed script tool, db lorum ipsum
		
	?>
