<?php
include_once('../connect/db_connect.php'); 
// include_once('../account/session.php');
class auction{
	public $auction_id;
	public $name;
	public $final_bid;
}
$user_id = 1;
$sql = "SELECT `item_auction_log`.`id`, `item_auction_log`.`item_id`, `item_auction_log`.`final_bid` FROM `item_auction_log` WHERE `item_auction_log`.`winner_id` = $user_id"; // sql selecting popular auctions
$query = mysqli_query($db_connect, $sql);
$num_rows = mysqli_num_rows($query);
$auctions=[];
if($num_rows > 0){
	while($row = mysqli_fetch_assoc($query)){
		$auction_id = $row['id'];
		$item_id = $row['item_id'];
		$final_bid = $row['final_bid'];
		$sql = "SELECT name FROM item WHERE id=$item_id";
		$query_2 = mysqli_query($db_connect, $sql);
		$row2 = mysqli_fetch_row($query_2);
		$name = $row2[0];
		$auction = new auction;
		$auction -> auction_id = $auction_id;
		$auction -> name = $name;
		$auction -> final_bid = $final_bid;
		array_push($auctions, $auction);
	}
} else {
	echo 'none';
}

echo json_encode($auctions);
exit();
?>