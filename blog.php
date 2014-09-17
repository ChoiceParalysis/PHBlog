<?php

use Acme\App;

require 'autoload.php';

$connection = new App\Connection();
if ( $connection->connect($config) ) {
	$conn = $connection->getConnection();
} else {
	die('Could not connect to the database');
}

$postRepository = new App\Post(array(
	'conn' => $conn
));