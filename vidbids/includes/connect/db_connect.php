<?php
header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$u = "root";
$p = "";
$db = "vidbids";

// Create connection
$db_connect = new mysqli($servername, $u, $p, $db);

// Check connection
if ($db_connect->connect_error) {
	echo 'failed to connect';
    die("Connection failed: " . $db_connect->connect_error);
}


?>