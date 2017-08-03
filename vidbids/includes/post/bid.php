<?php 
class return_data{
	public $user;
	public $previous;
}
// post bid to db
include_once('../connect/db_connect.php');
// TEMP USER ID
$user_id=1;
// TEMP AUCTION ID
$auction_id = mysqli_real_escape_string($db_connect, $_POST['auction_id']);
$auction_id = (int)$auction_id;
$sql = "SELECT coins FROM bidcoins WHERE user_id=$user_id";
$query = mysqli_query($db_connect, $sql);
$row = mysqli_fetch_row($query);
$bidcoins = $row[0];

$sql = "SELECT bid_price, current_highest FROM item_auction WHERE id=$auction_id";
$query = mysqli_query($db_connect, $sql);
$row = mysqli_fetch_row($query);
$bid_price = $row[0];
$current_highest = $row[1];

if($bidcoins < $bid_price){
	echo 'not_enough_coins';
	exit();
}
$sql = "UPDATE bidcoins SET coins=coins-$bid_price WHERE user_id=$user_id";
$query = mysqli_query($db_connect, $sql);

$sql="UPDATE item_auction SET bid_count=bid_count+1, `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=$user_id WHERE id=$auction_id";
$query = mysqli_query($db_connect, $sql);

$sql = "SELECT id FROM user_auction WHERE user_id=$user_id AND auction_id=$auction_id";
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
if($num_rows == 0){
	$sql = "INSERT INTO user_auction(user_id, auction_id) VALUES($user_id, $auction_id)";
	$query = mysqli_query($db_connect, $sql);
}
$return = new return_data;
$return -> user = $user_id;
$return -> previous = $current_highest;
echo json_encode($return);
?>