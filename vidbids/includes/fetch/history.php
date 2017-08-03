<?php 
include_once('../account/session.php');
	// select completed auctions that the user won
class auction{
	public $auction_id;
	public $name;
	public $bid_price;
	public $current_bid;
	public $timestamp;
	public $winning_user;
}
$sql="";
$query = mysqli_query($db_connect, $sql);
$completed = [];
$num_rows = mysqli_num_rows($query);
if($num_rows > 0){
	while($row = mysqli_fetch_assoc($query)){
		$auction_id = $row['id'];
		$name = $row['name'];
		$current_bid = $row['current_bid'];
		$timestamp = "COMPLETED";
		$winning_user = "YOU";
		$auction = new auction;
		$auction -> auction_id = $auction_id;
		$auction -> name = $name;
		$auction -> bid_price = $bid_price;
		$auction -> current_bid = $current_bid;
		$auction -> timestamp = $timestamp;
		$auction -> winning_user = $winning_user;
		array_push($completed, $auction);
	}
	echo json_encode($completed);
} else {
	echo 'none';
}
?>