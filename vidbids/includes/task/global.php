<?php 
include_once('../connect/db_connect.php');
$sql = "SELECT * FROM item_auction";
$query = mysqli_query($db_connect, $sql);
$n = 0.003472;
while($row = mysqli_fetch_assoc($query)){
	$auction_id = $row['id'];
	$item_id = $row['item_id'];
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
	if($diff >= $left && $winner_id == 0){
		$sql="UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=$auction_id";
		$query2 = mysqli_query($db_connect, $sql);
	} else if($diff >= $left && $winner_id != 0 && $left > 10){
		$sql="UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=$auction_id";
		$query2 = mysqli_query($db_connect, $sql);
	} else if($diff >= $left && $winner_id != 0 && $left == 10){
		$profit = $bid_price * $n * $bid_count - $cost;
		$sql = "INSERT INTO item_auction_log(id, item_id, final_bid, `timestamp`, bid_count, winner_id, profit, paid) VALUES($auction_id, $item_id, $current_bid, '$now', $bid_count, $winner_id, $profit, 'no')";
		$query2 = mysqli_query($db_connect, $sql);
		$sql = "DELETE FROM item_auction WHERE id=$auction_id";
		$query2 = mysqli_query($db_connect, $sql);
		$sql = "SELECT active FROM item WHERE id=$item_id";
		$query2 = mysqli_query($db_connect, $sql);
		$row = mysqli_fetch_row($query);
		if($row[0] == 1){
			$sql = "INSERT INTO item_auction(item_id, current_bid, `timestamp`, bid_count, bid_price, cost, current_highest, start_time) VALUES($item_id, 0.01, NOW(), 0, $bid_price, $cost, 0, NOW())";
			$query2 = mysqli_query($db_connect, $sql);
		}
	}		
}
?>
