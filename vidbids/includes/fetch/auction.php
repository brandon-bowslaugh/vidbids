<?php 

include_once('../account/session.php');
// select specific auction info
/*
	redirect shinanegans
*/
class return_data{
	public $name;
	public $bid_price;
	public $current_bid;
	public $timestamp;
	public $winning_user;
}

$auction_id = mysqli_real_escape_string($db_connect, $_POST['auction_id']);

$sql = ""; // get the item_id
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
if($num_rows > 0){

	while($row = mysqli_fetch_assoc($query)){

		$item_id = $row['item_id'];
		$current_bid = $row['current_bid'];
		$timestamp = $row['timestamp'];
		$current_highest = $row['current_highest'];

	}

} else {
	echo 'none';
}


$sql = ""; // use item_id to get item info
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
if($num_rows > 0){

	while($row = mysqli_fetch_assoc($query)){
		$name = $row['name'];
		$bid_price = $row['bid_price'];
	}

} else {
	echo 'item_null';
}

$sql="";
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
if($num_rows > 0){
	while($row = mysqli_fetch_assoc($query)){
		$winning_user = $row['username'];
	}
} else {
	echo 'fake_user';
}

$return = new return_data;
$return -> name = $name;
$return -> bid_price = $bid_price;
$return -> current_bid = $current_bid;
$return -> timestamp = $timestamp;
$return -> winning_user = $winning_user;

echo json_encode($return);

?>