<?php
include_once('../connect/db_connect.php'); 
// include_once('../account/session.php');
class auction{
	public $auction_id;
	public $name;
	public $bid_price;
	public $current_bid;
	public $timestamp;
	public $thumbnail;
}
$user_id=1;
$sql = "SELECT `item_auction`.`id`, `item_auction`.`item_id`, `item_auction`.`current_bid`, `item_auction`.`timestamp` FROM `item_auction`, `user_auction` WHERE `item_auction`.`id` = `user_auction`.`auction_id` AND `user_auction`.`user_id` = $user_id"; // sql selecting popular auctions
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
$auctions=[];
if($num_rows > 0){
	while($row = mysqli_fetch_assoc($query)){
		$auction_id = $row['id'];
		$item_id = $row['item_id'];
		$current_bid = $row['current_bid'];
		$timestamp = $row['timestamp'];

		$sql = "SELECT name, bid_price, thumb FROM item WHERE id=$item_id";
		$query_2 = mysqli_query($db_connect, $sql);
		$row2 = mysqli_fetch_row($query_2);
		$name = $row2[0];
		$bid_price = $row2[1];
		$thumb = $row2[2];
		$auction = new auction;
		$auction -> auction_id = $auction_id;
		$auction -> item_id = $item_id;
		$auction -> name = $name;
		$auction -> bid_price = $bid_price;
		$auction -> current_bid = $current_bid;
		$auction -> timestamp = $timestamp;
		$auction -> thumbnail = $thumb;
		array_push($auctions, $auction);
	}
} else {
	echo 'none';
}

echo json_encode($auctions);
exit();
?>