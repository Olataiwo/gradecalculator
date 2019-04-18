

<?php

//    $dsn = 'mysql:host = localhost;dbname=grading_system';
//    $username = 'root';
//    $password = '';
//
//
//    try {
//        
//        $db = new PDO($dsn, $username, $password);
//    }catch(PDOException $e) {
//        echo $e->getMessage();
//        exit();
//    }

    # define db constants
	define("DBNAME", "grading_system");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBHOST", "localhost");

	try {
		$conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

?>

