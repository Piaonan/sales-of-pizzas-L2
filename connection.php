<?php 

function connection($quest){
	try {
		require('db_config.php');
		$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		exit("Erreur de connexion" .$e->getMessage());
	}
	
	$res = $db->prepare($quest);
	return $res;
}

function lastCid($randomletter,$thisId,$rid,$today){
	try {
		require('db_config.php');
		$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		exit("Erreur de connexion" .$e->getMessage());
	}
	
	$insert = $db->prepare('INSERT INTO commandes VALUES (DEFAULT,?,?,?,?,DEFAULT)');
	$insert->execute(array($randomletter,$thisId,$rid,$today));
	if (!$insert) return 0;
	
	return $db->lastInsertId();
}








