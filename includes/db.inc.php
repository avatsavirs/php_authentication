<?php
	define('ROOT_URL', 'http://localhost/ecell/');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'abcd#1234');
	define('DB_NAME', 'ecell');
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(mysqli_connect_errno()){
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}