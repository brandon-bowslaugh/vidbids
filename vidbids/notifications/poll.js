var redis = require("redis"),
	client = redis.createClient(),
	mysql = require("mysql"),
	moment = require("moment"),
	n = 0.003472;


var con = mysql.createConnection({
	host : "192.168.0.14",
	user : "shesmu",
	password : "Soulcaliber1"
});

function now(){
	return moment.format();
}

con.query('USE vidbids');

//setInterval(function(){
	con.query("SELECT * FROM item_auction", function (err, result){
		for(i in result){
			var auction_id = result[i].id,
				item_id = result[i].item_id,
				winner_id = result[i].current_highest,
				current_bid = result[i].current_bid,
				bid_price = result[i].bid_price,
				bid_count = result[i].bid_count,
				cost = result[i].cost,
				auction_time = result[i].timestamp;
			var now = moment(),
				auction_time = moment(auction_time),
				diff = now.diff(auction_time, 'seconds'),
				left = (1 - (bid_price * n * bid_count / cost)) * 100 / 5 + 10;

			if(left < 10){
				left = 10;
			}
			if(diff >= left && winner_id == 0){
				//sql="UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=" + auction_id + "";
				con.query("UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=" + auction_id);
			}

			else if(diff >= left && winner_id != 0 && left > 10){
				//sql="UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=" + auction_id + "";
				con.query("UPDATE item_auction SET `timestamp` = NOW(), current_bid=current_bid+0.01, current_highest=0 WHERE id=" + auction_id);
			}

			else if(diff >= left && winner_id != 0 && left == 10){
				var profit = bid_price * n * bid_count * - cost;
				con.query("INSERT INTO item_auction_log(id, item_id, final_bid, `timestamp`, bid_count, winner_id, profit, paid) VALUES("+auction_id+", "+item_id+", "+current_bid+", '"+now+"', "+bid_count+", "+winner_id+", "+profit+", 'no')");
				con.query("DELETE FROM item_auction WHERE id="+auction_id+"");
				con.query("SELECT active FROM item WHERE id="+item_id, function(err, result){
					if(result == 1 || result[0].active == 1){
						con.query("INSERT INTO item_auction(item_id, current_bid, `timestamp`, bid_count, bid_price, cost, current_highest, start_time) VALUES("+item_id+", 0.01, NOW(), 0, "+bid_price+", "+cost+", 0, NOW())");
					}
				});
			}
		}
	})
//}, 900)
