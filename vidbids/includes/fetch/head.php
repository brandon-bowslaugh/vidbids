<?php 
	// select users bidcoins and username
	include_once("../account/session.php");

	class return_data{
		public $name;
		public $bid_coins;
	}

	$sql = "SELECT username FROM user_data WHERE id = $user_id" //get the username
	$query = mysqli_query($db_connect, $sql);
	$row = mysqli_fetch_row($query);
	$return_data -> name = $row[0];

	$sql = "SELECT coins FROM bid_coins WHERE user_id = $user_id" //get that dank coin count
	$query = mysqli_query($db_connect, $sql);
	$row = mysqli_fetch_row($query);
	$return_data -> bid_coins = $row[0];

	echo json_encode($return_data);

?>