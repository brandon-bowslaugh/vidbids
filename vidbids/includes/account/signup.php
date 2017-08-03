<?php
header('Access-Control-Allow-Origin: *');
include_once('../connect/db_connect.php');

$email = mysqli_real_escape_string($db_connect, $_POST['email']);
$username = mysqli_real_escape_string($db_connect, $_POST['username']);
if(isset($_POST['password'])){
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
	echo 'password_empty';
	exit();
}
if($email == NULL || $email == ""){
	echo 'failed';
	exit();
}
if($password == NULL || $password == ""){
	echo 'failed';
	exit();
}

$sql = "SELECT * FROM userdata WHERE email='$email'";
$query=mysqli_query($db_connect, $sql);
$rows = mysqli_num_rows($query);
if($rows > 0){
	echo 'duplicate_email';
	exit();
}
$sql = "INSERT INTO userdata(email, password, username) VALUES('$email', '$password', '$username')";
$query = mysqli_query($db_connect, $sql);

$sql = "SELECT id FROM userdata WHERE email='$email'";
$query = mysqli_query($db_connect, $sql);
$row = mysqli_fetch_row($query);
$user_id = $row[0];
$sql = "INSERT INTO bidcoins(user_id, coins) VALUES ($user_id, 0)";
$query = mysqli_query($db_connect, $sql);
session_start();
$_SESSION['login_user']=$email; // Initializing Session
echo 'success';
exit();
?>