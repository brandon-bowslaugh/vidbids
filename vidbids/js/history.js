$(document).ready(function(){
	var time_assoc = [];

	function auction_packet(product, final_bid, time_left, id, bid_price){
		if(time_left == undefined){
			var packet = `<div class="col-4 auction-container complete-auction" id="` + id + `"">
						<div class="title-container">
							<p>` + product + `</p>
						</div>
						<div class="info-container">
							<p id="current_price">` + final_bid + `</p>
							<p class="cur-bid">Final Bid</p>
							<p class="pay-now" auction_id="` + id + `">Pay Now</p>
						</div>
					</div>`;
		}
		else{
			var packet = `<div class='auction-group'>
							<div class="auction-container active-auction" id='` + id + `'>
								<div class="title-container">
									<p>` + product + `</p>
								</div>
								<div class="info-container">
									<p id="current_price">` + final_bid + `</p>
									<p class="cur-bid">Current Bid</p>
									<p class="time_left">Sec Left</p>
								</div>
							</div>
							<button class='orange_button' auction_id="` + id + `"><p>BID NOW</p></button>
							<p class='bid-cost'>` + bid_price + ` bidcoins to bid</p>
						</div>`
						/*
						<div class='auction-group'>
							<div class='auction-container active-auction'>
								<div class='title-container'>
									<p>Zelda: Breath of the Wild</p>
								</div>
								<div class='info-container'>
									<p id='current_price'>20.49</p>
									<p class='cur-bid'>Current Bid</p>
									<p class='time_left'>Time Left: 9 sec</p>
								</div>
							</div>
							<button class='orange_button'><p>BID NOW</p></button>
							<p class='bid-cost'>92 bidcoins to bid</p>
						</div>
						*/
		}

		return packet;
	}

	function append_data(array){
		console.log(array);
		for(i=0; i < array.length; i++){
			$("#" + array[i].auction_id).children(".info-container").children(".time_left").html(array[i].left + " Sec Left");
		}
	}

	$.ajax({
		method : "POST",
		url : "http://192.168.0.14/vidbids/includes/fetch/my_auctions.php",
		success : function(data){
			console.log(data);
			var result = JSON.parse(data);
			var product = "";
			var bid = "";
			var id = "";
			var time_left = "";
			var bid_price = "";
			var html = "";
			for(var i = 0; i<result.length; i++){
				product = result[i].name;
				bid = result[i].current_bid;
				id = result[i].auction_id;
				time_left = result[i].timestamp;
				bid_price = result[i].bid_price;
				html += auction_packet(product, bid, time_left, id, bid_price);
			}
			html += "<div style='clear:both;'></div>";
			$('#active-auctions').html(html);

			for(i=0; i < result.length; i++){
				time_assoc[i] = result[i].auction_id; 
			}
		}
	});

	$.ajax({
		method : "POST",
		url : "http://192.168.0.14/vidbids/includes/fetch/my_completed.php",
		success : function(data){
			console.log(data);
			var result = JSON.parse(data);
			var product = "";
			var bid = "";
			var id = "";
			var time_left = undefined;
			var bid_price = "";
			var html = "";
			for(var i = 0; i<result.length; i++){
				product = result[i].name;
				bid = result[i].final_bid;
				id = result[i].auction_id;
				html += auction_packet(product, bid, time_left, id, bid_price);
			}
			$('#auctions-won').html(html);
		}
	});


	setInterval(function(){
		get_time(time_assoc, append_data);
	}, 800);
})