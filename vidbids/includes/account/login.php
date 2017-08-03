<?php
header('Access-Control-Allow-Origin: *');
include_once("../connect/db_connect.php");

session_start(); // Starting Session
$error=''; // Variable To Store Error Message


	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "field_empty";
		echo $error;
	}
	else
	{
		// Define $username and $password
		$email=mysqli_real_escape_string($db_connect, $_POST['email']);
		$password=$_POST['password'];
		$sql = "SELECT `userdata`.`password` FROM `userdata` WHERE `userdata`.`email`='$email'";
		$query = mysqli_query($db_connect, $sql);
		$row = mysqli_fetch_row($query);
		$password_db = $row[0];
		if(password_verify($password, $password_db )==true){
			$sql = "SELECT * FROM userdata WHERE email='$email'";
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($db_connect, $sql);
			$rows = mysqli_num_rows($query);

			if ($rows > 0) {
				echo 'success';
				$_SESSION['login_user']=$email; // Initializing Session
			} else {
				$error = "account_doesnt_exist";
				echo $error;
				exit();
			}
		}
	}

?>