<?php
include_once('../connect/db_connect.php'); 
// select popular, completed and relevant auctions
class auction{
	public $auction_id;
	public $left;
	public $current_bid;
}
$n = 0.003472;
$auction_ids = $_POST['auction_ids'];
$auction_ids = array_unique($auction_ids);
$auctions=[];
foreach($auction_ids as $auction_id){
	$auction_id = mysqli_real_escape_string($db_connect, $auction_id);
	$auction_id = (int)$auction_id;
	$sql = "SELECT id, current_bid, current_highest, bid_price, bid_count, cost, `timestamp` FROM item_auction WHERE id=$auction_id"; // sql selecting auctions timers with auction_id
	$query = mysqli_query($db_connect, $sql);
	$num_rows = mysqli_num_rows($query);
	if($num_rows > 0){

		while($row = mysqli_fetch_assoc($query)){
			$auction_id = $row['id'];
			$winner_id = $row['current_highest'];
			$current_bid = $row['current_bid'];
			$bid_price = $row['bid_price'];
			$bid_count = $row['bid_count'];
			$cost = $row['cost'];
			$auction_time = $row['timestamp'];
			$now = new DateTime();
			$auction_time = date_create_from_format('Y-m-d H:i:s', $auction_time);
			$date1 = date_timestamp_get($now);
			$date2 = date_timestamp_get($auction_time);
			$diff = $date1 - $date2;
			$left = (1 - ($bid_price * $n * $bid_count / $cost)) * 100 / 5 + 10;
			if($left < 10){
				$left = 10;
			}
			$left = round($left);
			if($diff >= $left && $winner_id == 0){
				$time_left = $left;
				$current_bid = $current_bid + 0.01;
			} else if($diff >= $left && $winner_id != 0 && $left > 10){
				$time_left = $left;
				$current_bid = $current_bid + 0.01;
			} else if($diff >= $left && $winner_id != 0 && $left == 10){
				$time_left = $left;
				$current_bid = $current_bid + 0.01;
			} else {
				$time_left = $left - $diff;
			}
			$auction = new auction;
			$auction -> auction_id = $auction_id;
			$auction -> current_bid = $current_bid;
			$auction -> left = $time_left;	
			array_push($auctions, $auction);			
		}
	} else {
		echo 'none';
	}	
}
echo json_encode($auctions);
?>