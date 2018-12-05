<?php
//connector php
//this php file establish the connection to databaseeverytime a php file is open, thus only sql to be change

//Connect to minimalist database server
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=minimalist;charset=utf8','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
		
	catch (PDOException $e) { 
		$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
		echo $output;
		exit(1);
	}
	
	

?>