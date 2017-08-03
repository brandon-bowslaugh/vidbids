<?php
header('Access-Control-Allow-Origin: *');
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	include_once("../connect/db_connect.php");
	session_start();// Starting Session
	// Storing Session
	if(!isset($_SESSION['login_user'])){
		$failed = "true";
	}else{
		$user_check=$_SESSION['login_user'];
		// SQL Query To Fetch Complete Information Of User
		$sql = "SELECT email, id FROM userdata WHERE email='$user_check' LIMIT 1"; // where email='$user_check'
		$query=mysqli_query($db_connect, $sql);

		$row = mysqli_fetch_assoc($query);
		$login = $row['email'];
		$user_id = $row['id'];
		$failed="false";
		if($login != $user_check || $user_id == NULL){
			$failed = "true";
			echo 'failed';
		}
	}
?>